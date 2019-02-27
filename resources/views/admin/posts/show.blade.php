@extends('layouts.admin_app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h1>Post con id: {{ $post->id }}</h1>
                <h1>{{$post->title}}</h1>
                <h2>{{$post->author}}</h2>
                <h5>{{$post->content}}</h5>
                <h6>{{$post->category->title}}</h6>
            </div>
        </div>
    </div>
@endsection
