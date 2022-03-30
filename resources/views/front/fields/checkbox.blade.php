<div class="mb-3">
    <div class="form-check mb-2">
        <input
            type="checkbox"
            class="form-check-input"
            name="{{ $name }}"
            id="{{ $name }}"
            @if($value) checked @endif
            value="{{ $value }}"
        >
        <label class="form-check-label" for="{{ $name }}">
            {{ __('vars.label.' . $name) }}
        </label>
    </div>
</div>
