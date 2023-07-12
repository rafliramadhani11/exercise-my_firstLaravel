@extends('layouts.main')


@section('container')

@if (session()->has('success'))
<div class="w-50 m-auto alert alert-success alert-dismissible fade show " role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


@if (session()->has('LoginFailed'))
<div class="w-50 m-auto alert alert-danger alert-dismissible fade show " role="alert">
    {{ session('LoginFailed') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<main class="form-signin w-100 m-auto">
    <form action="/login" method="post">
        @csrf
        <h1 class="h3 mb-3 fw-normal text-center">{{ $judul }}</h1>
        <div class="form-floating mb-4">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required autofocus>
            <label for="email">Email address</label>
            @error('email')
            <div class="invalid-feedback position-absolute">
                {{ $message }}
            </div>
            @enderror

        </div>
        <div class="form-floating mb-4">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            <label for="password">Password</label>
            @error('password')
            <div class="invalid-feedback position-absolute">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button class="w-100 btn btn-lg btn-primary " type="submit" name="login">Sign in</button>
        <a href="/register" class="mt-3"><small> Register if haven't acount</small></a>
    </form>
</main>
@endsection