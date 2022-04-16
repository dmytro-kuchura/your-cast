<?php

namespace App\Repositories;

use App\Models\DictionaryLanguages;
use Illuminate\Database\Eloquent\Collection;

class DictionaryLanguagesRepository implements Repository
{
    public function get(int $id)
    {
        // TODO: Implement get() method.
    }

    public function all(): Collection|array
    {
        return DictionaryLanguages::all();
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
