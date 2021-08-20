<?php

namespace App\Repositories;

use App\Models\Episode;
use Illuminate\Database\Eloquent\Collection;

class EpisodesRepository implements Repository
{
    public function get(int $id): ?Episode
    {
        return Episode::find($id);
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function getAllUserEpisodes(int $userId): ?Collection
    {
        return Episode::where('user_id', $userId)->get();
    }

    public function store(array $data): Episode
    {
        $model = new Episode();

        $model->show_id = $data['show_id'];
        $model->audio = $data['audio'];
        $model->title = $data['title'];
        $model->description = $data['description'];
        $model->cover = $data['cover'];
        $model->episode = $data['episode'];
        $model->season = $data['season'];
        $model->episode_type = $data['episode_type'];
        $model->content = $data['content'];
        $model->duration = $data['duration'];
        $model->explicit = $data['explicit'];
        $model->status = $data['status'];

        $model->save();

        return $model;
    }

    public function update(array $data, int $id)
    {
        Episode::where('id', $id)->update($data);
    }

    public function destroy(int $id)
    {
        Episode::where('id', $id)->delete();
    }
}
