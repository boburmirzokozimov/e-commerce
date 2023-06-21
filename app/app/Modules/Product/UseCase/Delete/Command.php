<?php

namespace App\Modules\Product\UseCase\Delete;

use App\Modules\Product\Http\Request\DeleteRequest;

class Command
{
    public int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public static function fromRequest(DeleteRequest $request): static
    {
        return new static($request->validated('id'));
    }
}
