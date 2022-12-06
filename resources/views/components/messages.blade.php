@php
    $classes = ['success' => 'alert-success', 'error' => 'alert-danger'];
    $message = '';
@endphp

@foreach ($classes as $message => $class)
    @if ($message = session($message))
        <div class="notices me-2 me-sm-4 mb-4">
            <div class="show w-100 alert alert-dismissible fade col-md-6 {{ $class }}" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
@endforeach
