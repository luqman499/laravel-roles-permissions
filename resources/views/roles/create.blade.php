@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 rounded-4">

                    {{-- Card Header --}}
                    <div
                        class="card-header bg-primary text-white fs-5 fw-semibold rounded-top-4 d-flex justify-content-between align-items-center">
                        <span>{{ __('Roles / Create') }}</span>
                        <a href="{{ route('permission.index') }}" class="btn btn-sm btn-light text-primary fw-semibold">
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

                        <form method="POST" action="{{ route('role.store') }}">
                            @csrf
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label text-secondary">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name"
                                       value="{{ old('name') }}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label text-secondary d-block">Assign Roles:</label>
                                <div class="d-flex flex-wrap gap-3">
                                    @if($permissions->isNotEmpty())
                                        @foreach($permissions as $permission)
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="permission[]" id="permission_{{ $permission->id }}" value="{{ $permission->name }}">
                                                <label class="form-check-label" for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <p class="mb-0 text-secondary fs-6"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

