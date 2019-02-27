<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Sport', 'Informatica', 'Tempo Libero', 'Viaggi', 'Tecnologia'];

        foreach ($categories as $categoryName) {

            $newCategory = new Category;

            $newCategory->title = $categoryName;
            $newCategory->slug = Str::slug($categoryName);

            $newCategory->save();
        }
    }
}
