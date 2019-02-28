@extends('layouts.admin_app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Tutti i post</h1>
                <a href={{ route('admin.category_list.create') }} class="btn btn-primary">Crea nuova categoria</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category Name</th>
                            <th>Category slug</th>
                            <th>Actions</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <th>{{$category->id}}</th>
                                <th><a href="{{ route('admin.category_list.show', $category->id) }}">{{$category->title}}</a></th>
                                <th>{{$category->slug}}</th>
                                <th><a href="{{ route('admin.category_list.edit', $category->id) }}">Edit</a></th>
                                <th><form action="{{ route('admin.category_list.destroy', $category->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <input class="btn btn-danger" type="submit" value="Delete">
                                </form></th>
                            </tr>
                        @empty
                            <h1>Non ci sono categorie da visualizzare</h1>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
