@extends('components.main')

@push('scripts')
    <script src="{{ mix('js/app.js') }}"></script>
@endpush

@section('content')
    <div id="app">
        <app></app>
    </div>
@endsection
