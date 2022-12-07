@extends('components.main')

@push('scripts')
    <script>window.resource = @if (isset($resource)) @json($resource); @else '' @endif </script>
    <script src="{{ mix('js/app.js') }}"></script>
@endpush

@section('content')
    <div id="app">
        <app></app>
    </div>
@endsection
