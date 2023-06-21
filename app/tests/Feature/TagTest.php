<?php

namespace Tests\Feature;

use App\Modules\Tag\Model\Tag;
use Tests\TestCase;

class TagTest extends TestCase
{
    public function test_admin_can_create_a_tag()
    {
        $this->signInAsAdmin();

        $this->post('admin/tags', ['name' => 'New Tag']);

        $this->assertDatabaseHas('tags', ['name' => 'New Tag']);
    }

    public function test_admin_can_update_a_tag()
    {
        $this->signInAsAdmin();

        $tag = Tag::factory()->create();

        $this->put($tag->path(), ['name' => 'New Tag']);

        $this->assertDatabaseHas('tags', ['name' => 'New Tag']);
    }
}
