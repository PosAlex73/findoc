<?php

namespace App\Http\Requests\Threads;

use App\Enums\MessageStatuses;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateThreadMessageRequest extends FormRequest
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
            'message' => 'required',
            'status' => ['required', Rule::in(MessageStatuses::getAll())],
            'thread_id' => ['required', 'exists:threads,id']
        ];
    }
}
