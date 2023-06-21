<?php

namespace Tests\Unit;


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

}
