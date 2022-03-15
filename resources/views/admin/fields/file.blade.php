@if(!empty($value))
    <p class="card-text"><a href="{{ $value ?? '' }}">{{ __('vars.download.' . $name) }}</a></p>
@endif
<div class="mb-3">
    <label class="form-label" for="{{ $name }}">{{ __('vars.label.' . $name) }}</label>
    <input class="form-control" type="file" name="{{ $name }}" id="{{ $name }}">
</div>
