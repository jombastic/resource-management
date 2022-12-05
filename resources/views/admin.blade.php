@extends('components.main')

@push('scripts')
    <script src="{{ mix('js/app.js') }}"></script>
@endpush

@section('content')
    <div id="app">
        <form action="" class="row">
            <div class="col-6 mb-3">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter title here">
                </div>
                <div class="mb-5">
                    <label for="resource-type" class="form-label">Resource Type</label>
                    <select id="resource-type" class="form-select" aria-label="Default select example">
                        <option selected>Select a resource type</option>
                        <option value="1">PDF Download</option>
                        <option value="2">HTML Snippet</option>
                        <option value="3">Link</option>
                    </select>
                </div>
                <html-snippet></html-snippet>
                <pdf-download></pdf-download>
                <link-component></link-component>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </form>


    </div>
@endsection
