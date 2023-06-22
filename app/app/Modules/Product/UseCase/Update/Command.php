<?php

namespace App\Modules\Product\UseCase\Update;

use App\Modules\Product\Http\Request\UpdateRequest;

class Command
{
    public int $id;
    public string $name;
    public string $description;
    public float $price;
    public $image = null;
    public int $category_id;
    public array $tags;

    public function __construct(int    $id,
                                string $title,
                                string $description,
                                       $photo,
                                float  $price,
                                int    $category_id,
                                array  $tags)
    {
        $this->id = $id;
        $this->name = $title;
        $this->description = $description;
        $this->price = $price;
        $this->image = $photo;
        $this->category_id = $category_id;
        $this->tags = $tags;
    }

    public static function fromRequest(UpdateRequest $request): static
    {
        return new static(
            $request->validated('id'),
            $request->validated('name'),
            $request->validated('description'),
            $request->validated('image'),
            $request->validated('price'),
            $request->validated('category_id'),
            $request->validated('tags'),
        );
    }

}
