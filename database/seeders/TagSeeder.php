<?php

namespace Database\Seeders;

use Faker\Factory as Faker;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        DB::table('tags')->insert([
            'name' => $faker->word,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
