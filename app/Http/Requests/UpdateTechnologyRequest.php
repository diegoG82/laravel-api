<?php



namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTechnologyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('technologies')->ignore($this->technology)],
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

