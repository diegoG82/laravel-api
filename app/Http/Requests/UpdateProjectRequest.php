<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|same:title',
            'content' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title Required.',
            'title.string' => 'Title must be a string.',
            'title.max' => 'Il titolo cant exceed :max caratteri.',
            'slug.required' => 'Slug required.',
            'slug.string' => 'Slug must be a string.',
            'content.required' => 'Content required.',
            'content.max' => 'Content cant exceed :max caratteri.', 
            
        ];
    }
}