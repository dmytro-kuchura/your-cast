<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UsersRepository;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    /** @var UsersRepository */
    private UsersRepository $repository;

    public function __construct(UsersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function usersList(): Collection
    {
        return $this->repository->all();
    }

    public function usersDetail(int $id): User
    {
        return $this->repository->findByID($id);
    }
}
