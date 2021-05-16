<?php

namespace App\Repositories;

use App\Models\Log;

class LogsRepository implements Repository
{
    public function get(int $id)
    {
        // TODO: Implement get() method.
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function store(array $data)
    {
        $model = new Log();

        $model->message = $data['message'];
        $model->context = $data['context'] ?? null;
        $model->level = $data['level'] ?? 'info';
        $model->remote_addr = $data['remote_addr'] ?? null;
        $model->user_agent = $data['user_agent'] ?? null;
        $model->request_header = $data['request_header'] ?? null;
        $model->request_body = $data['request_body'] ?? null;

        $model->save();
    }

    public function update(array $data, int $id)
    {
        // TODO: Implement update() method.
    }

    public function destroy(int $id)
    {
        Log::where('id', $id)->delete();
    }
}
