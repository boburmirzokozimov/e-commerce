<?php

namespace App\Modules\Category\UseCase\Create;

use App\Modules\Category\Http\Request\CreateRequest;

class Command
{
    public string $title;
    public string $description;
    public $photo;

    public function __construct(string $title, string $description, $photo)
    {
        $this->title = $title;
        $this->description = $description;
        $this->photo = $photo;
    }

    public static function fromRequest(CreateRequest $request): static
    {
        return new static(
            $request->validated('title'),
            $request->validated('description'),
            $request->validated('photo')
        );
    }
}
