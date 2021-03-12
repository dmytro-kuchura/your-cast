<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
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
            'podcast_owner' => $this->podcast_owner,
            'email_owner' => $this->email_owner,
            'step' => $this->step,
            'copyright' => $this->copyright,
            'created_at' => $this->created_at,
        ];
    }
}
