<?php

namespace Tests\Unit;


use App\Modules\Category\Model\Category;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $category = Category::factory()->create();

        $this->assertEquals('/admin/categories/' . $category->id, $category->path());
    }
}
