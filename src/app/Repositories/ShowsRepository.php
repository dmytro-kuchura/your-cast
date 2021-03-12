<?php

namespace App\Repositories;

use App\Models\Shows;

class ShowsRepository implements Repository
{
    public function get(int $id): ?Shows
    {
        return Shows::find($id);
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function store(array $data): Shows
    {
        $model = new Shows();

        $model->user_id = $data['user_id'];
        $model->title = $data['title'];
        $model->description = $data['description'];

        $model->save();

        return $model;
    }

    public function update(array $data, int $id)
    {
        Shows::where('id', $id)->update($data);
    }

    public function destroy(int $id)
    {
        Shows::where('id', $id)->delete();
    }
}
