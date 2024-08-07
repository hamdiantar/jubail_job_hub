@if (session('error') )
    <div class="col-md-12 text-center alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            <li>{{ session('error') }}</li>
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session('email') )
    <div class="col-md-12 text-center alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            <li>{{ session('email') }}</li>
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('success'))
    <div class="col-md-12 text-center alert alert-success alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            <li>{{ session('success') }}</li>
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
