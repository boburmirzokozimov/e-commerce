<?php

namespace Tests\Unit;


use App\Modules\Category\Model\Category;
use App\Modules\Product\Model\Product;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_it_has_a_path(): void
    {
        $category = Category::factory()->create();

        $this->assertEquals('/admin/categories/' . $category->id, $category->path());
    }

    public function test_it_has_many_products(): void
    {
        $category = Category::factory()->create();

        Product::factory()->create(['category_id' => $category->id]);

        $this->assertInstanceOf(Product::class, $category->products->first());
    }
}
