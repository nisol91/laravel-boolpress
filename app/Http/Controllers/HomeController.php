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
}
