<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;


class HomeController extends Controller
{
    public function index() {

        $posts = Post::orderBy('created_at', 'desc')->take(5)->get();
        $categories = Category::all();


        return view('home', compact('posts'), compact('categories'));
    }
    public function show($slug)
    {
        // dd($post->category->slug);
        $post = Post::where('slug', $slug)->first();


        return view('posts.show', compact('post'));

    }
    public function indexAjax() {

        $posts = Post::orderBy('created_at', 'desc')->get();

        return response()->json([
            'posts' => $posts,
        ]);


        // $categories = Category::all();
        // return view('home', compact('posts'), compact('categories'));
    }
}
