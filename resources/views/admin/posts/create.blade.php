@extends('layouts.admin_app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Aggiungi nuovo post</h1>
                <form class="form-group" action="{{ route('admin.posts.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="" placeholder="Enter title">
                        <label for="author">Author</label>
                        <input type="text" name="author" class="form-control" id="" placeholder="Enter author">
                        <label for="content">Content</label>
                        <textarea cols="30" rows="8" type="text" name="content" class="form-control" id="" placeholder="Enter content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Text</label>
                        <select  class="form-control" name="category_id">
                            @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                        </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Create new post">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
