<?php

namespace App\Modules\Category\Services;

use App\Modules\Category\UseCase;
use Illuminate\Support\Facades\DB;

class CategoryRepository
{
    public function create(UseCase\Create\Command $command): void
    {
        DB::table('categories')->insert([
            'title' => $command->title,
            'description' => $command->description,
            'photo' => $command->photo
        ]);
    }

    public function getById(int $id)
    {
        return DB::table('categories')->where('id', $id)->get()->first();
    }

    public function update(UseCase\Update\Command $command): void
    {
        DB::table('categories')->where('id', $command->getId())->update([
            'title' => $command->getTitle(),
            'description' => $command->getDescription(),
            'photo' => $command->getPhoto()
        ]);
    }
}
