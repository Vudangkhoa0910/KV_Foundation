<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // admin role
        Role::create([
            'role_id' => 1,
            'role_name' => 'admin'
        ]);

        // user role
        Role::create([
            'role_id' => 2,
            'role_name' => 'user'
        ]);
    }
}
