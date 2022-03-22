@extends('layouts.admin')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="col-md-12">
        <div class="pb-3">
            <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Back</a>
        </div>

        <ul>
            <li><strong>ID: </strong>{{ $post->id }}</li>
            <li><strong>Title: </strong>{{ $post->title }}</li>
            <li><strong>Slug: </strong>{{ $post->slug }}</li>
            <li><strong>Created at: </strong>{{ $post->created_at }}</li>
            <li><strong>Updated at: </strong>{{ $post->updated_at }}</li>
            <li><strong>Content: </strong><br>{{ $post->content }}</li>
        </ul>
    </div>
@endsection
