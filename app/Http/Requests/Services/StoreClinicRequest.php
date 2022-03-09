<?php

namespace App\Http\Requests\Services;

use App\Enums\Specs\ClinicStatuses;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreClinicRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'status' => ['required', Rule::in(ClinicStatuses::getAll())],
            'found' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ];
    }
}
