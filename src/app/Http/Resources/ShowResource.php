<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'userId' => $this->user_id,
            'title' => $this->title,
            'description' => $this->description,
            'artwork' => $this->artwork,
            'format' => $this->format,
            'timezone' => $this->timezone,
            'language' => $this->language,
            'explicit' => $this->explicit,
            'category' => $this->category,
            'tags' => $this->tags,
            'author' => $this->author,
            'podcastOwner' => $this->podcast_owner,
            'emailOwner' => $this->email_owner,
            'step' => $this->step,
            'status' => $this->status,
            'copyright' => $this->copyright,
            'created' => $this->created_at,
        ];
    }
}
