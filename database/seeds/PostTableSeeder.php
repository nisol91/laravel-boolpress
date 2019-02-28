<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;
use App\Category;



class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) {
            $newPost = new Post;
            $randomCategory = Category::inRandomOrder()->first();
            $newPost->title = $faker->sentence(4);
            $newPost->category_id = $randomCategory->id;
            $newPost->author = $faker->name();
            $newPost->content = $faker->text();

            $newPost->save();


        }
    }
}
