<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTechnologyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('technologies')],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name required.',
            'name.unique' => 'Name tech must be unique:',
        ];
    }
}