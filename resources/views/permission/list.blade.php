@extends('layouts.app')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-header bg-primary text-white fs-5 fw-semibold rounded-top-4">
                        {{ __('Permissions') }}
                    </div>

                    <div class="card-body bg-light rounded-bottom-4">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <p class="mb-0 text-secondary fs-6">{{ __('You are logged in!') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

