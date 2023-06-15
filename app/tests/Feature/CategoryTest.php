<?php

namespace Tests\Feature;

use App\Modules\Category\Model\Category;
use Tests\TestCase;

class CategoryTest extends TestCase
{

    /**
     * A basic feature test example.
     */
    public function test_admin_can_create_a_category(): void
    {
        $this->withoutExceptionHandling();

        $this->signInAsAdmin();

        $this->post('/admin/categories', [
            'title' => 'Phones',
            'description' => 'New phones for your family',
            'photo' => null
        ]);

        $this->assertDatabaseHas('categories', [
            'title' => 'Phones',
            'description' => 'New phones for your family',
            'photo' => null
        ]);
    }

    public function test_admin_can_edit_a_category()
    {
        $this->withoutExceptionHandling();
        $this->signInAsAdmin();

        $category = Category::factory()->create(['title' => 'Hello']);

        $this->put($category->path(), ['id' => $category->id,
            'title' => 'New Category Title',
            'description' => $category->description,
            'photo' => $category->photo]);

        $this->assertDatabaseHas('categories', ['title' => 'New Category Title']);
    }
}
