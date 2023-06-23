<?php

namespace App\Modules\Order\UseCase\Create;

use App\Modules\Order\Services\OrderRepository;

class Handler
{
    public function __construct(private OrderRepository $repository)
    {
    }

    public function handle(Command $command): void
    {
        $order = $this->repository->create($command);

        $order->addProducts($command->order)
            ->getTotalPrice()
            ->save();
    }
}
