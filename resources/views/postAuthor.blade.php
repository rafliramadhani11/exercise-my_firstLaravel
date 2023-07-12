@extends('layouts.main')

@section('container')
<h1>
    {{ $halaman }}
</h1>

<div class="container mt-5">

    <div class="card mb-3">
        <img src="https://source.unsplash.com/1200x400/?{{$posts[0]->category->name}}" class="card-img-top img-fluid" alt="...">
        <div class="card-body text-center">
            <h2> {{ $posts[0]->judul }} </h2>
            <h5 class="card-title">
                Author : {{ $posts[0]->author->name }} | {{ $posts[0]->category->name }} <small class="text-body-secondary">{{$posts[0]->created_at->diffForHumans()}}</small>
            </h5>
            <p>{{ $posts[0]->excerpt }}</p>

            <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">
                Read More
            </a>

        </div>
    </div>

    <div class="container">
        <div class="row ">
            @foreach ( $posts->skip(1) as $post)
            <div class="col py-5">
                <div class="card " style="width: 18rem; height: 30rem;">
                    <img src="https://source.unsplash.com/800x400/?{{$post->category->name}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3 class="card-title">{{ $post->judul }}</h3>
                        <p class="fw-bold">{{ $post->author->name }} | {{ $post->category->name }} </p>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <small>{{$posts[0]->created_at->diffForHumans()}}</small>
                        <a href="/posts/{{ $post->slug }}" class="btn btn-outline-dark position-absolute bottom-0 end-0 ">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection