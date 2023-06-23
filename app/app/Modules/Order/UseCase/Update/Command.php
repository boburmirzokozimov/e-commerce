<?php

namespace App\Modules\Order\UseCase\Update;

use App\Modules\Order\Http\Request\UpdateRequest;

class Command
{
    public string $name;
    public string $phone;
    public ?string $price = null;
    public ?array $order;
    public int $id;

    /**
     * @param string $name
     * @param string $phone
     * @param string|null $price
     * @param array|null $order
     * @param int $id
     */
    public function __construct(string $name, string $phone, ?string $price, ?array $order, int $id)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->price = $price;
        $this->order = $order;
        $this->id = $id;
    }

    public static function fromRequest(UpdateRequest $request, int $id): static
    {
        return new static(
            $request->validated('name'),
            $request->validated('phone'),
            $request->validated('price'),
            $request->validated('order'),
            $id
        );
    }
}
