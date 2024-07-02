<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UsersRepository;
use App\Repositories\UsersRolesRepository;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    private UsersRepository $repository;

    private UsersRolesRepository $rolesRepository;

    public function __construct(
        UsersRepository      $repository,
        UsersRolesRepository $rolesRepository
    )
    {
        $this->repository = $repository;
        $this->rolesRepository = $rolesRepository;
    }

    public function usersList(): Collection
    {
        return $this->repository->all();
    }

    public function usersDetail(int $id): User
    {
        return $this->repository->findByID($id);
    }

    public function updatePermissions(int $id, array $permissions): User
    {
        $data = [];

        foreach ($permissions as $permission => $value) {
            if ($value) {
                $data[] = $this->mapRoleName($permission);
            }
        }

        $this->rolesRepository->update($data, $id);

        return $this->repository->findByID($id);
    }

    private function mapRoleName(string $role): ?string
    {
        return match ($role) {
            'showRead' => 'SHOW_READ',
            'showWrite' => 'SHOW_WRITE',
            'showAnalytics' => 'SHOW_ANALYTICS',
            'episodesRead' => 'EPISODES_READ',
            'episodesWrite' => 'EPISODES_WRITE',
            'newsRead' => 'NEWS_READ',
            'newsWrite' => 'NEWS_WRITE',
            'subscribersRead' => 'SUBSCRIBERS_READ',
            'subscribersWrite' => 'SUBSCRIBERS_WRITE',
            'supportRead' => 'SUPPORT_READ',
            'supportWrite' => 'SUPPORT_WRITE',
            'contactsFormRead' => 'CONTACTS_READ',
            'contactsFormWrite' => 'CONTACTS_WRITE',
            'userRead' => 'USER_READ',
            'userWrite' => 'USER_WRITE',
            'profileRead' => 'PROFILE_READ',
            'profileWrite' => 'PROFILE_WRITE',
            'rolesUpdate' => 'ROLES_UPDATE',
            'notificationsRead' => 'NOTIFICATIONS_READ',
            'settingsRead' => 'SETTINGS_READ',
            'settingsWrite' => 'SETTINGS_WRITE',
            default => null,
        };
    }
}
