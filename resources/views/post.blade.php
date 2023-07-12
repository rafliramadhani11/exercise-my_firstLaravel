@extends('layouts.main')

@section('container')

{{-- {{  }} = HTML SPECIAL CHAR TIDAK DAPAT DI INPUT --}}

<div class="container  mb-3">
    <p>By. <a href="/posts?user={{ $post->user->name }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name}}</a> <small>( {{ $post->created_at->diffForHumans() }} )</small></p>
    @if ($post->image)
    <div style="max-width: 400px;max-height: 1200px;" class="m-auto">
        <img src="{{ asset('storage/'.$post->image) }}" class=" img-fluid " alt="...">
    </div>
    @else
    <img src="https://source.unsplash.com/1200x400/?{{$post->category->name}}" class=" img-fluid " alt="...">
    @endif
    <h3> {{ $post->judul }} </h3>
    <div class=" mt-3">
        {{-- {!!  !!} = MEMUNGKINKAN HTML SPECIAL CHAR DAPAT DI INPUT --}}
        <p> {!! $post->body !!} </p>
        <a href="/posts" class="text-decoration-none">Kembali ke Blog</a>
    </div>
</div>
@endsection