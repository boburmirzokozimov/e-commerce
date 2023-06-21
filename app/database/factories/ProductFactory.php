<?php

namespace Database\Factories;

use App\Modules\Category\Model\Category;
use App\Modules\Product\Model\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => fake()->sentence(2),
            'description' => fake()->paragraph(),
            'image' => fake()->image(),
            'price' => fake()->randomDigitNotNull(),
            'category_id' => Category::factory()
        ];
    }
}
