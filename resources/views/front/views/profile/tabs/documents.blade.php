@forelse($documents as $document)
    <h4>{{ $document->title }}</h4>
    <p>{{ $document->notice }}</p>
    <a href="{{ route('download', ['path' => $document->path, 'file' => 'todo']) }}">{{ __('vars.download_file') }}</a>
    <hr>
@empty
    <p>{{ __('vars.you_have_not_documents') }}</p>
@endforelse
