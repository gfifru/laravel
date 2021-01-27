@if(session()->has('success'))
    <div class="pt-3 pb-2 mb-3">
        <p class="alert alert-success">{{ session()->get('success') }}</p>
    </div>
@endif
@if(session()->has('warning'))
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <p class="alert alert-warning">{{ session()->get('warning') }}</p>
    </div>
@endif

@if($errors->any())
    <div class="pt-3">
        @foreach($errors->all() as $errorTxt)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $errorTxt }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    </div>
@endif
