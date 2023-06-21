<?php

namespace App\Modules\Product\UseCase\Update;

use App\Modules\Product\Services\ProductRepository;
use App\Services\FileUploader;

class Handler
{
    public function __construct(private ProductRepository $repository,
                                private FileUploader      $uploader)
    {
    }

    public function handle(Command $command): void
    {
        $product = $this->repository->getById($command->id);

        if (!empty($command->image)) {
            $this->uploader->remove($product->photo);
            $command->image = $this->uploader->upload($command->image, FileUploader::PRODUCT);
        } else {
            $command->image = $product->image;
        }

        $this->repository->update($command);
    }
}
