<?php

namespace App\Repositories;

use App\Models\UserIpHistory;

class UsersIpHistoryRepository implements Repository
{
    public function get(int $id): ?UserIpHistory
    {
        return UserIpHistory::where('user_id', $id)->first();
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function store(array $data): UserIpHistory
    {
        $userIpHistory = new UserIpHistory;

        $userIpHistory->user_id = $data['user_id'];
        $userIpHistory->ip_address = $data['ip_address'];
        $userIpHistory->country = $data['country'];
        $userIpHistory->city = $data['city'];
        $userIpHistory->browser = $data['browser'];

        $userIpHistory->save();

        return $userIpHistory;
    }

    public function update(array $data, int $id)
    {
        // TODO: Implement update() method.
    }

    public function destroy(int $id)
    {
        // TODO: Implement destroy() method.
    }
}
