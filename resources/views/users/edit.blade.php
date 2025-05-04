@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 rounded-4">

                    {{-- Card Header --}}
                    <div
                        class="card-header bg-primary text-white fs-5 fw-semibold rounded-top-4 d-flex justify-content-between align-items-center">
                        <span>{{ __('Users / Edit') }}</span>
                        <a href="{{ route('users.index') }}" class="btn btn-sm btn-light text-primary fw-semibold">
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

                        <form method="POST" action="{{route('users.update',$user->id)}}">
                            @csrf
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label text-secondary">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ old('name',$user->name) }}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label text-secondary">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{ old('email',$user->email) }}">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label text-secondary d-block">Assign Roles:</label>
                                <div class="d-flex flex-wrap gap-3">
                                    @if($roles->isNotEmpty())
                                        @foreach($roles as $role)
                                            <div class="form-check">
                                                <input {{($hasRole->contains($role->id)) ?'checked':''}} type="checkbox" class="form-check-input" name="role[]" id="permission_{{ $role->id }}" value="{{ $role->name }}">
                                                <label class="form-check-label" for="role_{{ $role->id }}">{{ $role->name }}</label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
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

