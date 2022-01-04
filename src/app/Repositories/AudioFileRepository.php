<?php

namespace App\Repositories;

use App\Models\AudioFile;

class AudioFileRepository implements Repository
{
    public function get(int $id): ?AudioFile
    {
        return AudioFile::find($id);
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function store(array $data): AudioFile
    {
        $model = new AudioFile();

        $model->duration = $data['duration'];
        $model->size = number_format($data['size'], 1, '.', '');
        $model->link = $data['link'];
        $model->status = 'enabled';
        //'enabled', 'disabled', 'drafted'

        $model->save();

        return $model;
    }

    public function update(array $data, int $id)
    {
        AudioFile::where('id', $id)->update($data);
    }

    public function destroy(int $id)
    {
        AudioFile::where('id', $id)->delete();
    }
}
