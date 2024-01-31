<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\User; 
use App\Models\Blog; 

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $userIds = User::pluck('id');
        $blogIds = Blog::pluck('id');

        DB::table('comments')->insert([
            'user_id' => $faker->randomElement($userIds),
            'blog_id' => $faker->randomElement($blogIds),
            'content' => $faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
