<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    // \App\Models\User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);


    public function run(): void
    {


        Category::create([
            'user_id' => 1,
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);
        Category::create([
            'user_id' => 2,
            'name' => 'Travelling',
            'slug' => 'travelling'
        ]);
        Category::create([
            'user_id' => 3,
            'name' => 'Design Graphic',
            'slug' => 'design-graphic'
        ]);

        Post::factory(15)->create();
    }
}
