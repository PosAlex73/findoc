<?php

namespace App\Http\Requests\Users;

use App\Enums\CommonStatuses;
use App\Enums\Specs\RecordType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRecordsRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'spec_id' => 'required|exists:specs,id',
            'type' => ['required', Rule::in(RecordType::getAll())],
            'datetime' => 'required',
            'text' => 'required'
        ];
    }
}
