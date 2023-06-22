<?php

namespace Tests\Feature;

use App\Modules\Product\Model\Product;
use Tests\TestCase;

class OrderTest extends TestCase
{
    public function test_an_admin_can_create_orders()
    {
        $this->withoutExceptionHandling();
        $this->signInAsAdmin();

        $product = Product::factory()->create();

        $this->post('/admin/orders', [
            'name' => 'Boburmirzo',
            'phone' => '123',
            'price' => '10000',
            'order' => [
                [
                    'product_id' => $product->id,
                    'count' => 1
                ]
            ]
        ]);

        $this->assertDatabaseHas('orders', [
            'name' => 'Boburmirzo',
            'phone' => '123',
            'price' => $product->price
        ]);

        $this->assertDatabaseHas('order_product', [
            'product_id' => $product->id,
            'count' => 1
        ]);
    }
}
