<?php

namespace App\Repositories;

use App\Models\ShowAnalyticsAudio;

class ShowAnalyticsAudioRepository implements Repository
{
    public function get(int $id): ?ShowAnalyticsAudio
    {
        return ShowAnalyticsAudio::find($id);
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function store(array $data): ShowAnalyticsAudio
    {
        $model = new ShowAnalyticsAudio();

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
        ShowAnalyticsAudio::where('id', $id)->update($data);
    }

    public function destroy(int $id)
    {
        ShowAnalyticsAudio::where('id', $id)->delete();
    }
}
