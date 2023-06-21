<?php

namespace Tests\Feature;

use App\Modules\Category\Model\Category;
use App\Modules\Product\Model\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{

    public function test_admin_can_create_a_product()
    {
        $this->signInAsAdmin();

        $category = Category::factory()->create();

        $product = [
            'name' => 'test',
            'description' => 'Hello world',
            'price' => 1000,
            'image' => null,
            'category_id' => $category->id
        ];

        $this->post('admin/products', $product);

        $this->assertDatabaseHas('products', $product);
    }

    public function test_admin_can_update_a_product()
    {
        $this->withoutExceptionHandling();
        $this->signInAsAdmin();

        $product = Product::factory()->create();
        $attributes = [
            'id' => $product->id,
            'name' => 'My new name',
            'description' => $product->description,
            'price' => $product->price,
            'image' => null,
            'category_id' => $product->category_id
        ];

        $this->put($product->path(), $attributes);
        $product->refresh();

        $this->assertDatabaseHas('products', ['name' => 'My new name']);
    }

}
