@extends('layouts.main')



@section('container')

<main class="form-signin w-100 m-auto">
    <form action="/register" method="post">

        @csrf
        <h1 class="h3 mb-3 fw-normal text-center">{{ $judul }}</h1>
        <!-- Username -->
        <div class="form-floating mb-4 position-relative">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="username" name="name" placeholder="Username" value="{{ old('name') }}" required>
            <label for="username">Username</label>
            @error('name')
            <div class="invalid-feedback position-absolute">
                {{ $message }}
            </div>
            @enderror
        </div>
        <!-- Email -->
        <div class="form-floating mb-4 position-relative">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
            <label for="email">Email address</label>
            @error('email')
            <div class="invalid-feedback position-absolute">
                {{ $message }}
            </div>
            @enderror
        </div>
        <!-- Password -->
        <div class="form-floating mb-4 position-relative">
            <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
            <label for="password">Password</label>
            @error('password')
            <div class="invalid-feedback position-absolute">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button class="w-100 btn btn-lg btn-primary " type="submit">Register</button>
    </form>
    <a href="/login"><small>Allready have account ? Login</small></a>
</main>
@endsection
