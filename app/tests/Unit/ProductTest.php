<?php

namespace Tests\Unit;


use App\Modules\Category\Model\Category;
use App\Modules\Product\Model\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_it_has_a_path(): void
    {
        $product = Product::factory()->create();

        $this->assertEquals('admin/products/' . $product->id, $product->path());
    }

    public function test_it_belongs_to_a_category(): void
    {
        $product = Product::factory()->create();

        $this->assertInstanceOf(Category::class, $product->category);
    }
}
