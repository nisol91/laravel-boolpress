@extends('layouts.app')
@section('content')
    <h1>Tutti i post</h1>
    <div class="row">
        <div class="col-6 flex">
            <form class='form-group' method="get" action="{{ route('categories.printPost') }}">
                {{-- @csrf --}}
                <div class="form-group">
                    <label for="category_id">Category Filter</label>
                    <select class="form-control" name="category_id">
                        @foreach ($categories as $category)
                          <option value='{{ $category->id }}'>{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Filter categories">
            </div>
            </form>
                @foreach ($categories as $category)
                {{-- <a href="{{ route('categories.printPost', $category->slug) }}" class="btn btn-primary">{{ $category->title }}</a> --}}
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

