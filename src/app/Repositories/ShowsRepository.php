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
        $model->artwork = $data['artwork'];
        $model->format = $data['format'];
        $model->timezone = $data['timezone'];
        $model->language = $data['language'];
        $model->explicit = $data['explicit'];
        $model->category = $data['category'];
        $model->tags = $data['tags'];
        $model->author = $data['author'];
        $model->podcast_owner = $data['podcast_owner'];
        $model->email_owner = $data['email_owner'];
        $model->copyright = $data['copyright'];

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
