@extends('components.main')

@push('scripts')
    <script></script>
    <script src="{{ mix('js/app.js') }}"></script>
@endpush

@section('content')
    <div id="app">
        <app></app>
    </div>
@endsection
