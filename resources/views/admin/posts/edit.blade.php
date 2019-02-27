@extends('layouts.admin_app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Aggiungi nuovo post</h1>
                <form class="form-group" action="{{ route('admin.posts.update', $post->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="" placeholder="Enter title" value="{{ $post->title }}">
                        <label for="author">Author</label>
                        <input type="text" name="author" class="form-control" id="" placeholder="Enter author" value="{{ $post->author }}">
                        <label for="content">Content</label>
                        <textarea cols="20" rows="8" type="text" name="content" class="form-control" id="" placeholder="Enter content">{{ $post->content }}</textarea>
                    </div>
                    {{-- <div class="form-group">
                        <label for="category_id">Category</label>
                        <select  class="form-control" name="category_id">
                            @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Update post">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
