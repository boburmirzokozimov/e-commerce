<?php

namespace Tests;

use App\Modules\User\Model\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase;

    use CreatesApplication;

    public function signInAsUser(): void
    {
        $this->actingAs(User::factory()->create());
    }

    public function signInAsAdmin(): void
    {
        $this->actingAs(User::factory()->create(['role' => 'admin']));
    }

    public function signInAsModerator(): void
    {
        $this->actingAs(User::factory()->create(['role' => 'moderator']));
    }

}
