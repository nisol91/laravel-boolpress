<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;


class CategoryController extends Controller
{
    public function printCategories ($slug) {


        $category = Category::where('slug', $slug)->first();

        if (empty($category)) {
            abort(404);
        }

        $data = [
            'category' => $category,
            'posts' => $category->posts
        ];
        //tutti i post associati a quella categoria

        return view('categories.printPost', $data);
    }
}
