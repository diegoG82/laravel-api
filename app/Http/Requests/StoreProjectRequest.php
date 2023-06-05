<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string',
            'content' => 'required|string|max:255',
            
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio.',
            'title.string' => 'Il titolo deve essere una stringa.',
            'title.max' => 'Il titolo non può superare :max caratteri.',
            'slug.required' => 'La descrizione è obbligatoria.',
            'slug.string' => 'La descrizione deve essere una stringa.',
            'content.string' => 'Il campo thumb deve essere una stringa.',
            'content.max' => 'Il campo thumb non può superare :max caratteri.',
            
        ];
    }
}