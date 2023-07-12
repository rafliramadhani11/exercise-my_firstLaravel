@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row">
        <div class="col-md-6 ">
            <h2 class="mb-2"> {{ $judul }} </h2>
            <form action="/posts">
                @if (request('category') )
                <input type="hidden" name="category" value="{{ request('category') }}">
                @else
                <input type="hidden" name="user" value="{{ request('user') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search By Judul" name="search" value="{{ request('search') }}">
                    <button class="btn btn-success" type="submit" id="button-addon2">
                        <!-- ICON -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                        <!--  -->
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


@if ($posts->count())


<div class="container mt-3">
    <div class="card mb-3">
        @if ($posts[0]->image)
        <div style="max-width: 400px; overflow: hidden;margin: auto;">
            <img src="{{ asset('storage/'.$posts[0]->image) }}" class=" img-fluid " alt="...">
        </div>
        @else
        <img src="https://source.unsplash.com/1200x400/?{{$posts[0]->category->name}}" class=" img-fluid " alt="...">
        @endif
        <div class="card-body text-center">
            <h2> {{ $posts[0]->judul }} </h2>
            <h5 class="card-title">
                Author : <a href="/posts?user={{ $posts[0]->user->name }}" class="text-decoration-none">{{ $posts[0]->user->name  }}</a> | <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> <small class="text-body-secondary">{{$posts[0]->created_at->diffForHumans()}}</small>
            </h5>
            <p>{!! $posts[0]->excerpt !!}</p>
            <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-success">
                Read More
            </a>
        </div>
    </div>
</div>


<div class="container">
    <div class="row ">
        @foreach ( $posts->skip(1) as $post)
        <div class="col py-5">
            <div class="card " style="width: 18rem; height: 30rem;">
                @if ($post->image)
                <img src="" class=" img-fluid " alt="...">
                @else
                <img src="https://source.unsplash.com/800x400/?{{$post->category->name}}" class="card-img-top" alt="...">
                @endif
                <div class="card-body">
                    <h3 class="card-title">{{ $post->judul }}</h3>

                    <p class="fw-bold"> <a href="/posts?user={{ $post->user->name }}" class="text-decoration-none">{{ $post->user->name  }}</a> | <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name}}</a> </p>

                    <p class="card-text">{{ $post->excerpt }}</p>
                    <small>{{$post->created_at->diffForHumans()}}</small>
                    <a href="/posts/{{ $post->slug }}" class="btn btn-outline-success position-absolute bottom-0 end-0 ">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div>
    {{ $posts->links() }}
</div>
@else
<div class="container mt-3">
    <h1 class="text-center">No Post Found .</h1>
</div>
@endif

@endsection