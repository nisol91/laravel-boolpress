@extends('layouts.admin_app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Modifica categoria</h1>
                <form class="form-group" action="{{ route('admin.category_list.update', $category->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="" placeholder="Enter category name" value="{{$category->title}}">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control" id="" placeholder="Enter category slug" value="{{$category->slug}}">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Update category">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
