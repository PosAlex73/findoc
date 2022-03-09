<?php

namespace App\Http\Requests;

use App\Enums\Specs\SpecStatuses;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSpecRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
            'education' => 'required',
            'experience' => 'required',
            'spec_status' => ['required', Rule::in(SpecStatuses::getAll())]
        ];
    }
}
