<?php

namespace App\Repositories;

use App\Models\Episode;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class EpisodesRepository implements Repository
{
    public function get(int $id): ?Episode
    {
        return Episode::where('id', $id)->with('audioFile')->first();
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function getAllShowEpisodes(int $showId): ?LengthAwarePaginator
    {
        return Episode::where('show_id', $showId)->orderBy('id', 'desc')->paginate(6);
    }

    public function getAllUserEpisodes(int $userId): ?Collection
    {
        return Episode::where('user_id', $userId)->get();
    }

    public function store(array $data): Episode
    {
        $model = new Episode();

        $model->show_id = $data['show_id'];
        $model->audio_id = $data['audio_id'] ?? null;
        $model->cover = $data['cover'] ?? null;
        $model->title = $data['title'];
        $model->alias = $data['alias'];
        $model->link = $data['link'];
        $model->description = $data['summary'];
        $model->episode = $data['episode'];
        $model->season = $data['season'];
        $model->episode_type = $data['type'];
        $model->content = str_replace('&nbsp;', '', $data['summary']);
        $model->explicit = $data['explicit'];
        $model->status = 'drafted';

        $model->save();

        return $model;
    }

    public function update(array $data, int $id): void
    {
        $model = [];

        $model['audio_id'] = $data['audio_id'];
        $model['cover'] = $data['cover'] ?? null;
        $model['title'] = $data['title'];
        $model['alias'] = $data['alias'];
        $model['link'] = $data['link'];
        $model['episode'] = $data['episode'];
        $model['season'] = $data['season'];
        $model['episode_type'] = $data['type'];
        $model['content'] = str_replace('&nbsp;', '', $data['summary']);
        $model['explicit'] = $data['explicit'];

        Episode::where('id', $id)->update($model);
    }

    public function updateEpisodeStatus(string $status, int $id): void
    {
        $model = [];
        $model['status'] = $status;
        Episode::where('id', $id)->update($model);
    }

    public function destroy(int $id)
    {
        Episode::where('id', $id)->delete();
    }
}
