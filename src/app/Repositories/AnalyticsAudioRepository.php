<?php

namespace App\Repositories;

use App\Models\AnalyticsAudio;

class AnalyticsAudioRepository implements Repository
{
    public function get(int $id): ?AnalyticsAudio
    {
        return AnalyticsAudio::find($id);
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function store(array $data): AnalyticsAudio
    {
        $model = new AnalyticsAudio();

        $model->audio_file_id = $data['audio_file_id'];
        $model->url = $data['url'];
        $model->os = $data['os'];
        $model->country = $data['country'];
        $model->city = $data['city'];

        $model->save();

        return $model;
    }

    public function update(array $data, int $id)
    {
        AnalyticsAudio::where('id', $id)->update($data);
    }

    public function destroy(int $id)
    {
        AnalyticsAudio::where('id', $id)->delete();
    }
}
