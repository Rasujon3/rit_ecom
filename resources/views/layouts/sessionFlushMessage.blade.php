@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-2 mx-2" role="alert">
        {{ session('success') }}
{{--        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-error alert-dismissible fade show mt-2 mx-2" role="alert">
        {{ session('error') }}
{{--        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger mt-2 mx-2">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
