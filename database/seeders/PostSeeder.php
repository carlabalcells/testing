<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Post::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for($i=0; $i<20; $i++){
            Post::create([
                'title' => "Post ".$i,
                'slug' => "post-".$i,
                'description' => "Description Post ".$i,
                'content' => "Content of Post ".$i,
                'posted' => "no",
                'category_id' => Category::inRandomOrder()->first()->id,
                "image" => ""
            ]);
        }
    }
}
