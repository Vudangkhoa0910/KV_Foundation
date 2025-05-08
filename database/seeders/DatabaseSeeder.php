<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create roles
        Role::create(['role_id' => 1, 'role_name' => 'Admin']);
        Role::create(['role_id' => 2, 'role_name' => 'User']);

        // Create admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@kvfoundation.org',
            'password' => Hash::make('password'),
            'role_id' => 1,
            'display_name' => 'Admin',
            'user_name' => 'admin'
        ]);

        // Create regular users
        $users = collect([
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
                'display_name' => 'John',
                'user_name' => 'johndoe'
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => Hash::make('password'),
                'display_name' => 'Jane',
                'user_name' => 'janesmith'
            ]
        ])->map(function ($userData) {
            return User::create($userData);
        });

        // Create campaigns
        $campaigns = collect([
            [
                'title' => 'Education for All',
                'description' => 'Support underprivileged children\'s education and provide them with necessary resources.',
                'goal_amount' => 100000,
                'current_amount' => 75000,
                'end_date' => now()->addMonths(3),
                'image' => 'campaigns/education.jpg',
                'status' => 'active'
            ],
            [
                'title' => 'Healthcare Access',
                'description' => 'Provide essential healthcare services to communities in need.',
                'goal_amount' => 150000,
                'current_amount' => 90000,
                'end_date' => now()->addMonths(2),
                'image' => 'campaigns/healthcare.jpg',
                'status' => 'active'
            ],
            [
                'title' => 'Disaster Relief',
                'description' => 'Emergency support for communities affected by natural disasters.',
                'goal_amount' => 200000,
                'current_amount' => 180000,
                'end_date' => now()->addMonths(1),
                'image' => 'campaigns/disaster.jpg',
                'status' => 'active'
            ]
        ])->map(function ($campaignData) use ($admin) {
            return Campaign::create(array_merge($campaignData, ['user_id' => $admin->_id]));
        });

        // Create donations
        $campaigns->each(function ($campaign) use ($users) {
            $users->each(function ($user) use ($campaign) {
                Donation::create([
                    'user_id' => $user->_id,
                    'campaign_id' => $campaign->_id,
                    'amount' => rand(100, 1000),
                    'payment_method' => collect(['credit_card', 'bank_transfer'])->random(),
                    'status' => 'completed'
                ]);
            });
        });
    }
}
