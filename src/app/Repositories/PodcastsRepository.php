<?php

namespace App\Repositories;

use App\Models\Podcast;
use Illuminate\Database\Eloquent\Collection;

class PodcastsRepository implements Repository
{
    public function get(int $id): ?Podcast
    {
        return Podcast::find($id);
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function getAllUserPodcast(int $userId): ?Collection
    {
        return Podcast::where('user_id', $userId)->get();
    }

    public function store(array $data): Podcast
    {
        $model = new Podcast();

        $model->show_id = $data['show_id'];
        $model->title = $data['title'];
        $model->description = $data['description'];
        $model->image = $data['image'];
        $model->explicit = $data['explicit'];

        $model->save();

        return $model;
    }

    public function update(array $data, int $id)
    {
        Podcast::where('id', $id)->update($data);
    }

    public function destroy(int $id)
    {
        Podcast::where('id', $id)->delete();
    }
}
