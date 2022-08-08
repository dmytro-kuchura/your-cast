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

    public function getAllUserShow(int $userId): ?Collection
    {
        return Show::where('user_id', $userId)->get();
    }

    public function findByToken(string $token): ?Show
    {
        return Show::where('token', $token)->where('status', 'enabled')->with('episodes')->first();
    }

    public function getAllUserShowShort(int $userId): ?Collection
    {
        return Show::select('id', 'title', 'description', 'artwork')->where('user_id', $userId)->get();
    }

    public function store(array $data): Show
    {
        $model = new Show();

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
        $model->token = Str::random(10);

        $model->save();

        return $model;
    }

    public function update(array $data, int $id)
    {
        Show::where('id', $id)->update($data);
    }

    public function destroy(int $id)
    {
        Show::where('id', $id)->delete();
    }
}
