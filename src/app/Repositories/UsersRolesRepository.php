<?php

namespace App\Repositories;

use App\Models\UserRoles;

class UsersRolesRepository implements Repository
{
    public function get(int $id)
    {
        // TODO: Implement get() method.
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function store(array $data)
    {
        // TODO: Implement store() method.
    }

    public function update(array $data, int $id): void
    {
        UserRoles::where('user_id', $id)->delete();

        foreach ($data as $role) {
            $userRole = new UserRoles;
            $userRole->user_id = $id;
            $userRole->role = $role;
            $userRole->save();
        }
    }

    public function destroy(int $id)
    {
        // TODO: Implement destroy() method.
    }
}
