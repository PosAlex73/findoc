<div class="my-3 d-flex justify-content-end">
    <a href="{{ route('front.record') }}" class="btn_1">{{ __('vars.new_record') }}</a>
</div>
@forelse($records as $record)
    <a href="{{ route('front.doctors.view', ['spec' => $record->spec]) }}">{{ $record->spec->full_name }}</a>
    <p>{{ $record->text }}</p>
    <p class="text-muted">{{ $record->datetime }}</p>
    <hr>
@empty
    <p>{{ __('vars.you_have_no_records') }}</p>
@endforelse
