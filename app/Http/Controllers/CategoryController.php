<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;




class CategoryController extends Controller
{
    public function printCategories (Request $request) {


        $data = $request->all();

        if (empty($data['category_id'])) {
            abort(404);
        }

        $category = Category::find($data['category_id']);

        if (empty($category)) {
            abort(404);
        }

        $posts = Post::where('category_id', $category->id)->orderBy('id', 'desc')->limit(5)->get();

        //analogamente potevo usare questo, visto che
        //a ogni categoria sono associati tanti post (e non solo a ogni post e' associata una sola categoria)
        // $posts = $category->posts;

        return view('categories.printPost', compact('posts'), compact('category'));
    }


    //------in alternativa
    // public function printCategories ($id) {
    //     $posts = Post::where('id', $id)->get();
    //     //oppure
    //     $category = Category::where('category_id', $id)->get();
    //     $posts = $category->post
    //     //-----qua sotto rimane uguale
    //     if (empty($category)) {
    //         abort(404);
    //     }

    //     $data = [
    //         'category' => $category,
    //         'posts' => $category->posts
    //     ];
    //     //tutti i post associati a quella categoria

    //     return view('categories.printPost', $data);
    // }

}
