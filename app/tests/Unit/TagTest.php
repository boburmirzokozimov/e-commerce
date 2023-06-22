<?php

namespace Tests\Unit;


use App\Modules\Product\Model\Product;
use App\Modules\Tag\Model\Tag;
use Tests\TestCase;

class TagTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_it_has_a_path(): void
    {
        $tag = Tag::factory()->create();

        $this->assertEquals('/admin/tags/' . $tag->id, $tag->path());
    }

    public function test_it_belongs_to_many_products(): void
    {
        $tag = Tag::factory()->create();

        $product = Product::factory()->create();

        $product->tags()->attach($tag);

        $this->assertInstanceOf(Product::class, $tag->products->first->get());
    }
}
