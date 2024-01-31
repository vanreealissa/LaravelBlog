<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UserSeeder::class,
            BlogSeeder::class,
            TagSeeder::class,
            CommentSeeder::class,
            BlogTagSeeder::class,
        ]);

        //User
        //Blogs
        //Tags
        //Comments
        //BlogTag
    }
}
