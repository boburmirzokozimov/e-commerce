<?php

namespace App\Modules\Category\UseCase\Create;

use App\Modules\Category\Services\CategoryRepository;
use App\Services\FileUploader;

class Handler
{
    public function __construct(private CategoryRepository $repository,
                                private FileUploader       $uploader)
    {
    }

    public function handle(Command $command): void
    {
        if (!empty($command->photo)) {
            $command->photo = $this->uploader->upload($command->photo, FileUploader::CATEGORY);
        }

        $this->repository->create($command);
    }
}
