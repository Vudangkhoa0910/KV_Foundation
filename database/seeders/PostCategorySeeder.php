<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Technology',
            'Health',
            'Travel',
            'Food',
            'Education',
            'Finance',
            'Sports',
            'Lifestyle',
            'Entertainment',
            'Politics',
            'Science',
            'Culture',
            'DIY',
            'Parenting',
            'Art',
            'Photography',
            'History',
            'Gaming',
            'Books',
            'Environment',
        ];

        foreach ($categories as $category) {
            PostCategory::create([
                'post_category_name' => $category,
            ]);
        }
    }
}
