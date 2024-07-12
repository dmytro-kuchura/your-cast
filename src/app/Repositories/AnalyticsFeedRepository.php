<?php

namespace App\Repositories;

use App\Models\AnalyticsFeed;

class AnalyticsFeedRepository implements Repository
{
    public function get(int $id): ?AnalyticsFeed
    {
        return AnalyticsFeed::find($id);
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function store(array $data): AnalyticsFeed
    {
        $model = new AnalyticsFeed();

        $model->show_id = $data['show_id'];
        $model->url = $data['url'];
        $model->os = $data['os'];
        $model->agent = $data['agent'];
        $model->country = $data['country'];
        $model->city = $data['city'];

        $model->save();

        return $model;
    }

    public function update(array $data, int $id)
    {
        AnalyticsFeed::where('id', $id)->update($data);
    }

    public function destroy(int $id)
    {
        AnalyticsFeed::where('id', $id)->delete();
    }
}
