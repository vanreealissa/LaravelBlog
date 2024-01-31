<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\Tag;

class BlogTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogIds = Blog::pluck('id');
        $tagIds = Tag::pluck('id');
    
        foreach ($blogIds as $blogId) {
            if ($tagIds->count() > 0) {
                $numberOfTags = random_int(1, min(3, $tagIds->count()));
                $tagIdsForBlog = $tagIds->random($numberOfTags);
    
                foreach ($tagIdsForBlog as $tagId) {
                    DB::table('blogs_tags')->insert([
                        'blog_id' => $blogId,
                        'tag_id' => $tagId,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
    
}
