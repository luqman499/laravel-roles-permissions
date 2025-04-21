@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-header bg-primary text-white fs-5 fw-semibold rounded-top-4 d-flex justify-content-between align-items-center">
                        {{ __('Permissions') }}
                        <a href="{{ route('permission.create') }}" class="btn btn-sm btn-light text-primary fw-semibold">
                            + Create
                        </a>
                    </div>

                    <div class="card-body bg-light rounded-bottom-4">
                        {{-- Flash Message Component --}}
                        @if (session('success'))
                            <x-message type="success" :message="session('success')" />
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
