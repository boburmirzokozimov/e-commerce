<?php

namespace App\Modules\Product\UseCase\Delete;

use App\Modules\Product\Services\ProductRepository;
use App\Services\FileUploader;

class Handler
{
    public function __construct(private FileUploader      $uploader,
                                private ProductRepository $repository)
    {
    }

    public function handle(Command $command): void
    {
        $product = $this->repository->getById($command->id);

        if (!empty($product->image)) {
            $this->uploader->remove($product->image);
        }

        $this->repository->remove($product->id);
    }
}
