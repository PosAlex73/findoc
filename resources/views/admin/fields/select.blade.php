<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ __('vars.label.' . $name) }}</label>
    <select class="form-select" name="{{ $name }}" id="{{ $name }}">
        @foreach($variants as $key => $variant)
            <option @if(!empty($seleced) && $selected === $variant) selected @endif>{{ __('vars.' .$variant }}</option>
        @endforeach
    </select>
</div>
