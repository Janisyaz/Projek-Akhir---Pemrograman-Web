<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Visitor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now(),
        ]);

        // Categories
        $categories = ['Politik', 'Ekonomi', 'Olahraga', 'Teknologi', 'Hiburan'];
        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => Str::slug($category),
                'description' => 'Kategori ' . $category,
            ]);
        }

        // Articles
        Article::factory(10)->create();

        // Comments
        Comment::factory(50)->create();

        // Visitors
        Visitor::factory(200)->create();
    }
}