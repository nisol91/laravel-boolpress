@extends('layouts.admin_app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Tutti i post</h1>
                <a href={{ route('admin.posts.create') }} class="btn btn-primary">Crea nuovo post</a>
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
                                <th>{{$post->title}}</th>
                                <th>{{$post->author}}</th>
                                <th>{{str_limit($post->content, 20, ' (...)')}}</th>
                                <th>{{$post->category->title}}</th>

                            </tr>
                        @empty
                            <h1>Non ci sono post da visualizzare</h1>
                        @endforelse
                    </tbody>
                </div>
            </div>
        </div>
    </div>
@endsection
