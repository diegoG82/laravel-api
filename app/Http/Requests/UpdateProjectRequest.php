<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
// use Illuminate\Support\Str;


class UpdateProjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'=>['required', Rule::unique('projects')->ignore ($this->project)],
            'content' => 'nullable',        
            'type_id' => ['nullable', 'exists:types,id']
        ];
    }
    
    public function messages()
    {
        return [
            'title.required' => 'Title is required.',
            'title.string' => 'Title must be a string.',
            'title.max' => 'The title cannot exceed :max characters.',
            'slug.required' => 'Slug is required.',
            'slug.string' => 'Slug must be a string.',
            'slug.max' => 'The slug cannot exceed :max characters.',
            'slug.same' => 'The :attribute must match the title.',
            'content.required' => 'Content is required.',
            'content.max' => 'The content cannot exceed :max characters.',
        ];
    }
    
}