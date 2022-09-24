<?php

namespace App\Repositories;

use App\Models\UserTokens;
use Illuminate\Support\Carbon;

class UsersTokenRepository implements Repository
{
    public function find(string $token): ?UserTokens
    {
        return UserTokens::where('token', $token)->first();
    }

    public function get(int $id): ?UserTokens
    {
        return UserTokens::where('user_id', $id)->first();
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function store(array $data): UserTokens
    {
        $usersTokens = new UserTokens;

        $usersTokens->user_id = $data['user_id'];
        $usersTokens->token = $data['token'];
        $usersTokens->expired_at = Carbon::now()->addHours(8)->format('Y-m-d H:i:s');

        $usersTokens->save();

        return $usersTokens;
    }

    public function update(array $data, int $id)
    {
        // TODO: Implement update() method.
    }

    public function destroy(int $id)
    {
        // TODO: Implement destroy() method.
    }

    public function expired(int $id): void
    {
        $usersTokens = UserTokens::where('user_id', $id)->get();

        foreach ($usersTokens as $usersToken) {
            if (!Carbon::parse($usersToken->expired_at)->isPast()) {
                $usersToken->expired_at = Carbon::now()->format('Y-m-d H:i:s');
                $usersToken->save();
            }
        }
    }
}
