<?php

namespace App\Modules\Category\UseCase\Update;

use App\Modules\Category\Http\Request\UpdateRequest;

class Command
{
    private int $id;
    private string $title;
    private string $description;
    private $photo = null;

    public function __construct(int $id, string $title, string $description, ?string $photo)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->photo = $photo;
    }

    public static function fromRequest(UpdateRequest $request): static
    {
        return new static(
            $request->validated('id'),
            $request->validated('title'),
            $request->validated('description'),
            $request->validated('photo'),
        );
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto($photo): void
    {
        $this->photo = $photo;
    }
}
