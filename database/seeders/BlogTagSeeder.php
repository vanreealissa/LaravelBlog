<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogId = DB::table('blogs')->insertGetId([
            'user_id' => 1, 
            'title' => 'Voorbeeldblog',
            'foto' => 'example.jpg',
            'location' => 'Ergens',
            'description' => 'Dit is een voorbeeldblog.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $tags = ['Laravel', 'PHP', 'Programming'];
        foreach ($tags as $tagName) {
            $tagId = DB::table('tags')->insertGetId([
                'name' => $tagName,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('blogs_tags')->insert([
                'blog_id' => $blogId,
                'tag_id' => $tagId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
