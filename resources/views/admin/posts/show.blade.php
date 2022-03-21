@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul>
                    <li>ID: {{ $post->id }}</li>
                    <li>TITLE: {{ $post->title }}</li>
                    <li>SLUG: {{ $post->slug }}</li>
                    <li>CONTENT: {{$post->content}}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
