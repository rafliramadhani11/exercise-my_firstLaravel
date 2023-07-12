@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-lg-3 border-bottom">
        <h2>Create Post</h2>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/posts" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" id="judul" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{old('judul')}}" autofocus>
                @error('judul')
                <div class="invalid-feedback">
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug')}}">
                @error('slug')
                <div>
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label ">Category</label>
                <select class="form-select " id="category" name="category_id" required>
                    <option selected disabled></option>
                    @foreach ($categories as $category)
                    @if (old('category_id') == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <img class="img-preview img-fluid d-block mb-3 col-sm-5">
                <label for="image" class="form-label @error('image') is-invalid @enderror">Input Image</label>
                <input class="form-control" type="file" id="image" name="image" onchange="PreviewImage()">
                @error('image')
                <p class="text-danger">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label ">Body</label>
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>
                @error('body')
                <p class="text-danger">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mb-3">Create Post</button>
        </form>
    </div>
</main>


@endsection