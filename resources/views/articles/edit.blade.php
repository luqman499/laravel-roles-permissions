@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 rounded-4">

                    {{-- Card Header --}}
                    <div
                        class="card-header bg-primary text-white fs-5 fw-semibold rounded-top-4 d-flex justify-content-between align-items-center">
                        <span>{{ __('Articles / Edit') }}</span>
                        <a href="{{ route('articles.index') }}" class="btn btn-sm btn-light text-primary fw-semibold">
                            ← Back
                        </a>
                    </div>

                    {{-- Card Body --}}
                    <div class="card-body bg-light rounded-bottom-4">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('articles.update',$article->id) }}">
                            @csrf
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label text-secondary">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="title"
                                       value="{{ old('title',$article->title) }}">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <textarea name="text" id="text" cols="30" rows="10" placeholder="Content" class="form-control" >{{old('text',$article->text)}}</textarea>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="author" class="form-label text-secondary">Author</label>
                                <input type="text" class="form-control" name="author" placeholder="Author"
                                       value="{{ old('author',$article->author) }}">
                                @error('author')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        <p class="mb-0 text-secondary fs-6"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
