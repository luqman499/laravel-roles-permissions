@extends('layouts.app')

@section('title', '404 Not Found')

@section('content')
    <div class="container text-center mt-5">
        <h1>404 - Not Found</h1>
        <p>{{ $exception->getMessage() ?: 'The page you are looking for does not exist or you do not have the right permissions.' }}</p>
        <a href="{{ route('home') }}" class="btn btn-primary mt-3">Go Back to Home</a>
    </div>
@endsection
