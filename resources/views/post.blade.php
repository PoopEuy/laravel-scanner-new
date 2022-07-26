{{-- @dd($post); --}}
@extends('layouts.main')

@section('container')
    <article>
        <h2>{{ $post->title }}</h2>
        {{-- akan di ekseskusi sbagai text saja --}}
        {{-- <p>{{ $post->body }}</p>  --}}
        {{-- tidak mencetak tag <p>  --}}
        {!! $post->body !!}
    </article>

    <a href="/posts">Back to Posts</a>
@endsection
