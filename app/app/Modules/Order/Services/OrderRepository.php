<?php

namespace App\Modules\Order\Services;

use App\Modules\Order\Model\Order;
use App\Modules\Order\UseCase\Create\Command;

class OrderRepository
{

    public function create(Command $command)
    {
        return Order::query()->firstOrCreate([
            'name' => $command->name,
            'price' => $command->price,
            'phone' => $command->phone,
        ]);
    }

    public function getOrder(int $id)
    {
        return Order::query()->where('id', $id)->first();
    }
}
