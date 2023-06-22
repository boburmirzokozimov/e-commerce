<?php

namespace App\Modules\Product\UseCase\Create;

use App\Modules\Product\Http\Request\CreateRequest;

class Command
{
    public string $name;
    public string $description;
    public $image = null;
    public float $price;
    public int $category_id;
    public array $tags;


    public function __construct(string $name, string $description, $image, float $price, int $id, array $tags)
    {
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->price = $price;
        $this->category_id = $id;
        $this->tags = $tags;
    }

    public static function fromRequest(CreateRequest $request): static
    {
        return new static(
            $request->validated('name'),
            $request->validated('description'),
            $request->validated('image'),
            $request->validated('price'),
            $request->validated('category_id'),
            $request->validated('tags'),
        );
    }
}
