<?php

namespace App\Services;

use App\Exceptions\NotCreateNewUserException;
use App\Helpers\UidHelper;
use App\Mail\RegistrationEmail;
use App\Models\Enum\UserRole;
use App\Models\User;
use App\Repositories\UsersIpHistoryRepository;
use App\Repositories\UsersRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Contract\Auth as FirebaseAuth;
use Throwable;

class AuthService
{

    private UsersRepository $usersRepository;
    private UsersIpHistoryRepository $usersIpHistoryRepository;
    private FirebaseAuth $firebaseAuth;

    public function __construct(
        UsersRepository          $usersRepository,
        UsersIpHistoryRepository $usersIpHistoryRepository
    )
    {
        $this->usersRepository = $usersRepository;
        $this->usersIpHistoryRepository = $usersIpHistoryRepository;

        $factory = (new Factory)->withServiceAccount(Storage::path('firebase-auth.json'));
        $this->firebaseAuth = $factory->createAuth();
    }

    public function authorization(string $token): void
    {
        Auth::login($this->findUserByToken($token));
    }

    public function login(array $data): User
    {
        try {
            $signInResult = $this->firebaseAuth->signInWithEmailAndPassword($data['email'], $data['password']);
        } catch (Throwable $exception) {
            Log::info($exception->getMessage());
            throw new NotCreateNewUserException();
        }
        $user = $this->usersRepository->findByToken($signInResult->data()['localId']);
        $this->saveHistory($user);
        return $user;
    }

    public function register(array $data): User
    {
        $systemId = UidHelper::generateUid();
        try {
            $firebaseUser = $this->firebaseAuth->createUserWithEmailAndPassword($data['email'], $data['password']);
        } catch (Throwable $exception) {
            Log::info($exception->getMessage());
            throw new NotCreateNewUserException();
        }
        $user = $this->usersRepository->store([
            'email' => $firebaseUser->email,
            'name' => $data['name'],
            'password' => bcrypt(''),
            'system_id' => $systemId,
            'remember_token' => $firebaseUser->uid,
            'role' => UserRole::PODCASTER
        ]);
        Mail::to($user->email)->send(new RegistrationEmail($user));
        return $user;
    }

    public function generate(string $rememberToken): string
    {
        $token = $this->firebaseAuth->createCustomToken($rememberToken);
        return $token->toString();
    }

    public function reset(string $email): ?string
    {
        $user = $this->findUserByEmail($email);
        if ($user) {
            $token = Str::random(40);
            $this->passwordResetsRepository->store([
                'token' => $token,
                'email' => $email,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            return $token;
        }
        return null;
    }

    public function update(array $data): ?User
    {
        $passwordResets = $this->passwordResetsRepository->find($data['token']);
        if ($passwordResets) {
            $user = $this->findUserByEmail($passwordResets->email);
            $this->usersRepository->update([
                'password' => bcrypt($data['password']),
            ], $user->id);
            $this->passwordResetsRepository->delete($passwordResets->email);
            return $user;
        }
        return null;
    }

    public function isExpired(string $token): bool
    {
        $token = $this->firebaseAuth->parseToken($token);
        return $token->isExpired(Carbon::now());
    }

    public function findUserByToken(string $token): ?User
    {
        $token = $this->firebaseAuth->parseToken($token);
        $uid = $token->claims()->get('uid');
        return $this->usersRepository->findByToken($uid);
    }

    public function findUserByEmail(string $email): ?User
    {
        return $this->usersRepository->findByEmail($email);
    }

    public function saveHistory(User $user): void
    {
        $ip = geoip()->getLocation(geoip()->getClientIP());
        $this->usersIpHistoryRepository->store([
            'user_id' => $user->id,
            'ip_address' => geoip()->getClientIP(),
            'country' => $ip->country,
            'city' => $ip->city,
            'browser' => request()->userAgent(),
        ]);
    }
}
