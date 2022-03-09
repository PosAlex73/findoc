<?php

namespace App\Http\Requests;

use App\Enums\CommonStatuses;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:2:max:255',
            'description' => 'required',
            'status' => ['required', Rule::in(CommonStatuses::getAll())]
        ];
    }
}
