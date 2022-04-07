<?php

namespace App\Repositories;

interface CrudRepository
{
    public function get(int $id);

    public function store(array $data);

    public function update(array $data, int $id);

    public function destroy(int $id);
}
