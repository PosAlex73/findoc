<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ __('vars.label.' . $name) }}</label>
    @if(empty($key))
    <select class="form-select" name="{{ $name }}" id="{{ $name }}">
        @foreach($variants as $key => $variant)
            <option @if(!empty($selected) && $selected === $variant) selected @endif value="{{ $variant }}" >{{ __('vars.' . $variant) }}</option>
        @endforeach
    </select>
    @else
        <select class="form-select" name="{{ $name }}" id="{{ $name }}">
            @foreach($variants as $variant)
                <option
                    @if(!empty($selected) && $selected === $variant->$key)
                        selected
                    @endif
                    value="{{ $variant->$key }}">
                    {{ $variant->$value }}
                </option>
            @endforeach
        </select>
    @endif
</div>
