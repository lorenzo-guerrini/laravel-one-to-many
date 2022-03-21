@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>All Posts</h1>
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">New Post</a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->slug }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm"
                                        href="{{ route('admin.posts.show', ['post' => $post->id]) }}">Show</a>

                                    <a class="btn btn-warning btn-sm"
                                        href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">Edit</a>

                                    <form class="d-inline-block"
                                        action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
