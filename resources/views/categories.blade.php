@extends('layouts.main')

@section('container')

<h1>Post Category </h1>
<div class="container mt-5">
    <div class="row">
        @foreach ( $categories as $category)
        <div class="col py-5">
            <div class="card " style="width: 18rem; height: 17rem;">
                <img src="https://source.unsplash.com/800x400/?{{$category->name}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-title">{{ $category->name }}</h3>
                    <a href="/posts?category={{ $category->slug }}" class="btn btn-outline-success position-absolute bottom-0 end-0 ">
                        Check Category
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection