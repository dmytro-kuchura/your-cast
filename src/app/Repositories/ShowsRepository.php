<?php

namespace App\Repositories;

use App\Models\Show;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class ShowsRepository implements Repository
{
    public function get(int $id): ?Show
    {
        return Show::with('episodes')->find($id);
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function store(array $data): Show
    {
        $model = new Show();

        $model->user_id = $data['user_id'];
        $model->title = $data['title'];
        $model->description = str_replace('&nbsp;', '', $data['description']);
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
        $model->token = Str::random(10);

        $model->save();

        return $model;
    }

    public function update(array $data, int $id): void
    {
        $data['description'] = str_replace('&nbsp;', '', $data['description']);
        Show::where('id', $id)->update($data);
    }

    public function destroy(int $id): void
    {
        Show::where('id', $id)->delete();
    }

    public function getAllUserShow(int $userId): ?Collection
    {
        return Show::where('user_id', $userId)->get();
    }

    public function findByToken(string $token): ?Show
    {
        return Show::where('token', $token)->where('status', 'enabled')->first();
    }

    public function getAllUserShowShort(int $userId): ?Collection
    {
        return Show::select('id', 'title', 'description', 'artwork')->where('user_id', $userId)->get();
    }

    public function getShortShowInfo(int $id): ?Show
    {
        return Show::select('id', 'title', 'description', 'artwork')->where('id', $id)->first();
    }

    public function getPopular(): ?Collection
    {
        return Show::where('status', 'enabled')->limit(5)->get();
    }

    public function getByToken(string $token): ?Show
    {
        return Show::where('token', $token)->where('status', 'enabled')->first();
    }
}
