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
    //    User::factory(5)->create();

       $user = User::factory()->create([
        'name' => 'John Doe',
        'email' => 'johndoe@gmail.com',
       ]);
       Blog::factory(6)->create([
        'user_id' => $user->id,
       ]);

    }
}
