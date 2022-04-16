<?php

namespace App\Repositories;

use App\Models\DictionaryTimezones;
use Illuminate\Database\Eloquent\Collection;

class DictionaryTimezonesRepository implements Repository
{
    public function get(int $id)
    {
        // TODO: Implement get() method.
    }

    public function all(): Collection|array
    {
        return DictionaryTimezones::all();
    }

    public function store(array $data)
    {
        // TODO: Implement store() method.
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
