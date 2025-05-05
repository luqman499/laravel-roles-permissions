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
                                    <th style="width: 20%; text-align: center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($permissions as $permission)
                                    <tr>
{{--                                        <td>{{ $permission->id }}</td>--}}
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->created_at->format('d M Y') }}</td>
                                        <td style="text-align: center;">
                                            <a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete(this)">Delete</button>

                                            <form action="{{ route('permission.destroy', $permission->id) }}" method="POST" class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
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

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow-lg">
                <div class="modal-header bg-primary text-white rounded-top-4">
                    <h5 class="modal-title" id="deleteConfirmModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <p class="fs-5 mb-0">Are you sure you want to permanently delete this record?</p>
                </div>
                <div class="modal-footer d-flex justify-content-center border-0 pb-4">
                    <button type="button" class="btn btn-outline-primary px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary px-4" id="confirmDeleteButton">Delete</button>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            let deleteButton = null;

            function confirmDelete(button) {
                deleteButton = button;  // Save the button that was clicked
                var myModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
                myModal.show();
            }

            document.getElementById('confirmDeleteButton').addEventListener('click', function () {
                if (deleteButton) {
                    deleteButton.nextElementSibling.submit(); // Submit the form next to the clicked button
                }
            });
        </script>
    @endpush

@endsection
