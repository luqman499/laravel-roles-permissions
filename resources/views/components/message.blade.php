@if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show py-2 px-3 mb-3 position-relative" role="alert" style="font-size: 0.9rem; line-height: 1.4;">
        {{ Session::get('success') }}
        <button type="button" class="btn-close position-absolute top-50 end-0 translate-middle-y me-2" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
