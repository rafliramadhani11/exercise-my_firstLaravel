@extends('dashboard.layouts.main')

@section('container')
<!-- MAIN CONTENT -->
<main class="col-md-7 ms-sm-auto col-lg-10 p-md-4">
    <div class="container  mb-3">

        <div class="my-3">
            <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span>Back to My Post</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span>Edit</a>
            <form action="/dashboard/posts/{{$post->slug}}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <button class="btn btn-danger "><span data-feather="delete"></span>Delete</button>
            </form>
        </div>
        <p>By. {{ $post->user->name }} in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name}}</a> <small>( {{ $post->created_at->diffForHumans() }} )</small></p>

        <div class="my-3">
            @if ($post->image)
            <div style="max-width: 400px;max-height: 1200px;">
                <img src="{{ asset('storage/'.$post->image) }}" class=" img-fluid " alt="...">
            </div>
            @else
            <img src="https://source.unsplash.com/1200x400/?{{$post->category->name}}" class=" img-fluid " alt="...">
            @endif
        </div>

        <h3> {{ $post->judul }} </h3>
        <div class=" mt-3">
            {{-- {!!  !!} = MEMUNGKINKAN HTML SPECIAL CHAR DAPAT DI INPUT --}}
            <p> {!! $post->body !!} </p>
        </div>
    </div>
</main>
<!-- --------------- -->
@endsection