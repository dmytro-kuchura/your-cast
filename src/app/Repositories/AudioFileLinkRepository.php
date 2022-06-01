<?php

namespace App\Repositories;

use App\Models\AudioFileLink;

class AudioFileLinkRepository implements Repository
{
    public function get(int $id): ?AudioFileLink
    {
        return AudioFileLink::find($id);
    }

    public function find(string $token): ?AudioFileLink
    {
        return AudioFileLink::where('token', $token)->first();
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function store(array $data): AudioFileLink
    {
        $model = new AudioFileLink();

        $model->token = $data['token'];
        $model->status = 'enabled';
        //'enabled', 'disabled', 'drafted'

        $model->save();

        return $model;
    }

    public function update(array $data, int $id)
    {
        AudioFileLink::where('id', $id)->update($data);
    }

    public function destroy(int $id)
    {
        AudioFileLink::where('id', $id)->delete();
    }
}
