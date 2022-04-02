@forelse($records as $record)
    <a href="{{ route('front.doctors.view', ['spec' => $record->spec]) }}">{{ $record->spec->full_name }}</a>
    <p>{{ $record->text }}</p>
    <p class="text-muted">{{ $record->datetime }}</p>
    <hr>
@empty
    <p>{{ __('vars.you_have_no_records') }}</p>
@endforelse
