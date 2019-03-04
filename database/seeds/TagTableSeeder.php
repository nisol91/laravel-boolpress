<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;


class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Html', 'JavaScript', 'Coding', 'Php', 'Laravel', 'Vue.js'];

        foreach ($tags as $tag) {
            $newTag = new Tag;
            $newTag->title = $tag;
            $newTag->slug = Str::slug($tag);

            $newTag->save();

        }
    }
}
