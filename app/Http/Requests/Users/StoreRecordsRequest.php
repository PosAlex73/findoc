<?php

namespace App\Http\Requests\Users;

use App\Enums\CommonStatuses;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRecordsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'spec_id' => 'required|exists:specs,id',
            'type' => ['required', Rule::in(CommonStatuses::getAll())],
            'datetime' => 'required',
        ];
    }
}
