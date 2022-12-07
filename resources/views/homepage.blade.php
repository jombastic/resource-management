@extends('components.main')

@section('content')
    <h1 class="mb-3">Resources</h1>
    @foreach ($resources as $resource)
        <div class="p-3 mb-3 border bg-light">
            <h3><a href="{{ route('admin').'/'.$resource->id }}">{{ $resource->title }}</a></h3>            
            <p><strong>Resource type:</strong> {{ $resource->resourceType }}</p>    
            @if ($resource->resourceType == 'PDF Download')
                <p><strong>PDF:</strong> <i class="bi bi-file-earmark-pdf-fill text-danger"></i> {{ $resource->pdfFile }}</p>
            @endif        
            @if ($resource->resourceType == 'HTML Snippet')
                <p><strong>Description:</strong> {{ $resource->snippetDescription }}</p>
                <p><strong>Snippet:</strong></p>
                <pre class="text-bg-dark p-3">
                    {!! $resource->htmlSnippet !!}
                </pre>
            @endif        
            @if ($resource->resourceType == 'Link')
                <p><strong>URL:</strong> <a href="{{ $resource->url }}" @if($resource->openLinkInNewTab) target="_blank" @endif>{{ $resource->url }}</a></p>
            @endif        
        </div>
    @endforeach

    {{ $resources->withQueryString()->links('pagination::bootstrap-5') }}
@endsection
