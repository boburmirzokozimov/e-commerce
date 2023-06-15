<?php

namespace App\Modules\Category\UseCase\Update;

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

        $category = $this->repository->getById($command->getId());

        if (!empty($command->getPhoto())) {
            $this->uploader->remove($category->photo);
            $command->setPhoto($this->uploader->upload($command->getPhoto(), FileUploader::CATEGORY));
        } else {
            $command->setPhoto($category->photo);
        }

        $this->repository->update($command);
    }
}
