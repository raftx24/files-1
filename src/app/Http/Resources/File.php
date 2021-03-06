<?php

namespace LaravelEnso\Files\app\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use LaravelEnso\TrackWho\app\Http\Resources\TrackWho;

class File extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->original_name,
            'size' => $this->size,
            'mimeType' => $this->mime_type,
            'type' => $this->type(),
            'owner' => new TrackWho($this->whenLoaded('createdBy')),
            'isDestroyable' => $this->destroyableBy($request->user()),
            'isShareable' => $this->shareableBy($request->user()),
            'isViewable' => $this->viewableBy($request->user()),
            'createdAt' => $this->created_at->toDatetimeString(),
        ];
    }
}
