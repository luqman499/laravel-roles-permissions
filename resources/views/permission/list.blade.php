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
                        <x-message />

                        <div class="table-responsive mt-4">
                            <table class="table table-bordered table-hover align-middle mb-0">
                                <thead class="table-primary">
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th>Name</th>
                                    <th>Created</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="#" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">No permissions found.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
