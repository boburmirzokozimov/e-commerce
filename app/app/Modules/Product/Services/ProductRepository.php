<?php

namespace App\Modules\Product\Services;

use App\Modules\Product\Model\Product;
use App\Modules\Product\UseCase;
use Illuminate\Support\Facades\DB;

class ProductRepository
{
    public function create(UseCase\Create\Command $command): void
    {
        DB::table('products')->insert(
            [
                'name' => $command->name,
                'description' => $command->description,
                'image' => $command->image,
                'price' => $command->price,
                'category_id' => $command->category_id
            ]
        );
    }

    public function update(UseCase\Update\Command $command): void
    {
        DB::table('products')->where('id', $command->id)->update([
            'name' => $command->name,
            'description' => $command->description,
            'image' => $command->image,
            'price' => $command->price,
            'category_id' => $command->category_id
        ]);
    }

    public function getById(int $id)
    {
        return DB::table('products')->where('id', $id)->get()->first();
    }

    public function remove(int $product): void
    {
        Product::destroy($product);
    }
}
