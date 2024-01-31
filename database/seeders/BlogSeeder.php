<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $userIds = DB::table('users')->pluck('id');

        DB::table('blogs')->insert([
            'user_id' => $faker->randomElement($userIds),
            'title' => $faker->sentence,
            'foto' => $faker->imageUrl(),
            'location' => $faker->city,
            'description' => $faker->paragraphs(3, true),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
