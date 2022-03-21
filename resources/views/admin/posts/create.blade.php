@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>New Post</h1>
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

                <form action="{{ route('admin.posts.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" placeholder="New post's title" required>
                    </div>

                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" class="form-control" rows="10" placeholder="New post's content" required></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
