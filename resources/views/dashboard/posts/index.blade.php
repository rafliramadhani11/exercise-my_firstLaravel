@extends('dashboard.layouts.main')

@section('container')
<!-- MAIN CONTENT -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-lg-3 border-bottom">
        <h1> My Post </h1>
    </div>

    <div class="my-3">
        <a href="/dashboard/posts/create" class="btn btn-primary">Create Post</a>
    </div>

    @if (session()->has('success'))
    <div class="w-50  col-sm-8 alert alert-success alert-dismissible fade show " role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="table-responsive col-md-10">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post )
                <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td> {{ $post->judul }} </td>
                    <td> {{ $post->category->name }} </td>
                    <td>
                        <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-primary text-decoration-none ">
                            <span data-feather="eye"></span>
                        </a>
                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-success text-decoration-none ">
                            <span data-feather="edit"></span>
                        </a>
                        <form class="d-inline" action="/dashboard/posts/{{ $post->slug }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="badge bg-danger border-0" onclick="confirm('Are you sure ?')">
                                <span data-feather="delete"></span>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
<!-- --------------- -->
@endsection
