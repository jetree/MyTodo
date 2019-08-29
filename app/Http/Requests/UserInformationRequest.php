<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInformationRequest extends FormRequest
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
            'name' => 'required'
            'year' => 'nullable|digits:4',
            'month' => 'nullable',
            'day' => 'nullable',
            'gender' => 'nullable|digits:1',
            'comment' => 'nullable|string'

        ];
    }
}
