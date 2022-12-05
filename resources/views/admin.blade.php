@extends('components.main')

@section('content')
    <div id="app">
        <form action="">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Enter title here">
            </div>
        </form>


        <html-snippet></html-snippet>
        <pdf-download></pdf-download>
        <link-component></link-component>
    </div>
@endsection
