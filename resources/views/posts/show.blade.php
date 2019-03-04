@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h1>Post con id: {{ $post->id }}</h1>
                <h1>{{$post->title}}</h1>
                <h2>{{$post->author}}</h2>
                <h5>{{$post->content}}</h5>
                <h6>Category: {{$post->category->title}}</h6>
                <h2>Tag:</h2>
                @foreach ($post->tags as $tag)
                    <h6>{{$tag->title}}</h6>
                @endforeach
                {{-- questo foreach va fatto per forza perche ci sono piu tags associati a
                    un post. Per le categorie invece, essendocene solo una, potevo evitare di fare il foreach --}}
            </div>
        </div>
    </div>
@endsection
