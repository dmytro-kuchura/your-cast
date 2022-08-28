<?php

namespace App\Repositories;

use App\Models\Subscribe;
use Illuminate\Support\Str;

class SubscribeRepository implements Repository
{
    public function get(int $id): ?Subscribe
    {
        return Subscribe::where('id', $id)->first();
    }

    public function findByEmail(string $email): ?Subscribe
    {
        return Subscribe::where('email', $email)->first();
    }

    public function all(): array
    {
        return Subscribe::all();
    }

    public function store(array $data): Subscribe
    {
        $subscribe = new Subscribe;

        $subscribe->email = $data['email'];
        $subscribe->token = Str::uuid();

        $subscribe->save();

        return $subscribe;
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
