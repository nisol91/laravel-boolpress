@extends('layouts.app')
@section('content')
    <h1>Tutti i post</h1>
    <div class="row">
        <div class="col-6 flex">
            <h4>Category Filter</h4>
                @foreach ($categories as $category)
                {{-- {{dd($category)}} --}}
                <a href="{{ route('categories.printPost', $category->slug) }}" class="btn btn-primary">{{ $category->title }}</a>
                @endforeach
        </div>
    </div>
    <table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Content</th>
            <th>Category Id</th>

        </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <th>{{$post->id}}</th>
                    <th><a href="{{ route('posts.show', $post->slug) }}">{{$post->title}}</a></th>
                    <th>{{$post->author}}</th>
                    <th>{{str_limit($post->content, 100, ' (...)')}}</th>
                    <th>{{$post->category->title}}</th>
                </tr>
            @empty
                <h1>Non ci sono post da visualizzare</h1>
            @endforelse
        </tbody>
    </table>
@endsection

