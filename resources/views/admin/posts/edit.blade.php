@extends('layouts.admin')

@section('title')
    Edit: {{ $post->title }}
@endsection

@section('content')
    <div class="col-12">
        <div class="pb-3">
            <a href="{{ route('admin.posts.index') }}" class="btn btn-danger">Back</a>
        </div>

        {{-- <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div> --}}

        <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror"
                    placeholder="Post's title" value="{{ old('title', $post->title) }}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror" rows="10"
                    placeholder="Post's content">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
