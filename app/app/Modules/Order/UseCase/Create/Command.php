<?php

namespace App\Modules\Order\UseCase\Create;

use App\Modules\Order\Http\Request\CreateRequest;

class Command
{
    public string $name;
    public string $phone;
    public ?string $price = null;
    public ?array $order;

    /**
     * @param string $name
     * @param string $phone
     * @param string|null $price
     * @param array|null $order
     */
    public function __construct(string $name, string $phone, ?string $price, ?array $order)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->price = $price;
        $this->order = $order;
    }

    public static function fromRequest(CreateRequest $request): static
    {
        return new static(
            $request->validated('name'),
            $request->validated('phone'),
            $request->validated('price'),
            $request->validated('order'),
        );
    }
}
