<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UsersIpHistoryRepository;

class IpHistoryService
{
    private UsersIpHistoryRepository $ipHistoryRepository;

    public function __construct(UsersIpHistoryRepository $ipHistoryRepository)
    {
        $this->ipHistoryRepository = $ipHistoryRepository;
    }

    public function saveHistory(User $user): void
    {
        $ip = geoip()->getLocation(geoip()->getClientIP());
        $this->ipHistoryRepository->store([
            'user_id' => $user->id,
            'ip_address' => geoip()->getClientIP(),
            'country' => $ip->country,
            'city' => $ip->city,
            'browser' => request()->userAgent(),
        ]);
    }
}
