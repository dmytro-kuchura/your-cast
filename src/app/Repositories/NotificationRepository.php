<?php

namespace App\Repositories;

use App\Models\Enum\NotificationType;
use App\Models\Notification;
use Illuminate\Database\Eloquent\Collection;

class NotificationRepository implements Repository
{
    public function unread(int $userId): ?Collection
    {
        return Notification::where('user_id', '=', $userId)->where('is_read', '=', false)->get();
    }

    public function get(int $id): Notification
    {
        return Notification::find($id);
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function store(array $data): void
    {
        $model = new Notification();

        $model->user_id = $data['user_id'];
        $model->title = $data['title'];
        $model->content = $data['content'];
        $model->is_read = false;
        $model->type = $data['type'] ?? NotificationType::INFO;

        $model->save();
    }

    public function update(array $data, int $id)
    {
        // TODO: Implement update() method.
    }

    public function destroy(int $id): void
    {
        Notification::where('id', $id)->delete();
    }
}
