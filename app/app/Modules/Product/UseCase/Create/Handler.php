<?php

namespace App\Modules\Product\UseCase\Create;

use App\Modules\Product\Services\ProductRepository;
use App\Services\FileUploader;

class Handler
{
    public function __construct(private FileUploader      $uploader,
                                private ProductRepository $productRepository)
    {
    }

    public function handle(Command $command): void
    {
        if ($command->image) {
            $command->image = $this->uploader->upload($command->image, FileUploader::PRODUCT);
        }

        $this->productRepository->create($command);
    }
}
