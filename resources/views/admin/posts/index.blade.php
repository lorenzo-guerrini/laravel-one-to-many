@extends('layouts.admin')

@section('title', 'All Posts')

@section('content')
    <div class="col-md-12">
        <div class="pb-3">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-success">New Post</a>
        </div>

        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th class="col-3">Title - Slug</th>
                    <th class="col-2">Category</th>
                    <th class="col-5">Content</th>
                    <th class="text-center col-2">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>

                        <td>
                            <div><strong>{{ $post->title }}</strong></div>
                            <div>({{ $post->slug }})</div>
                        </td>

                        <td class="text-center">
                            {{ $post->category ? $post->category->name : "/"}}
                        </td>

                        <td>
                            {{ substr($post->content, 0, 150) }}
                            @if (strlen($post->content) > 150)
                                (...)
                            @endif
                        </td>

                        <td class="text-center">
                            <a class="btn btn-primary btn-sm mb-1"
                                href="{{ route('admin.posts.show', ['post' => $post->id]) }}">More Info</a>

                            <a class="btn btn-primary btn-sm mb-1"
                                href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">Edit</a>

                            <form class="d-inline-block mb-1"
                                action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="POST"
                                onsubmit="return confirm('Are you sure?')">
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
@endsection
