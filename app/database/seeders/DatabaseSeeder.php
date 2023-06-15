<?php

namespace Database\Seeders;

use App\Modules\User\Model\Role;
use App\Modules\User\Model\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Boburmirzo Kozimov',
            'role' => Role::ADMIN,
            'email' => 'john@example.com',
            'password' => Hash::make('test'),
        ]);
    }
}
