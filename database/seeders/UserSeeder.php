<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'user_name' => 'admin',
            'role_id' => 1,
            'display_name' => 'Admin',
            'user_email' => 'admin@admin.com',
            'password' => 'admin'
        ]);

        // create users with posts between 3 and 10 posts for each user
        User::factory(10)
            ->has(
                Post::factory()
                    ->count(fake()->numberBetween(3, 10))
            )
            ->create();
    }
}
