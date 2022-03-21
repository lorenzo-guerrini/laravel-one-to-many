@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Edit Post</h1>
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Back</a>
                </div>

                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="New post's title"
                            value="{{ old('title', $post->title) }}" required>
                    </div>

                    <div class="form-group">
                        <label>Content</label>
                        <textarea id="content" name="content" class="form-control" rows="10" placeholder="New post's content"
                            required>{{ old('content', $post->content) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    @endsection
