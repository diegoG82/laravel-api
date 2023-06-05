<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;


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
            'slug' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    if ($value !== Str::slug($this->input('title'), '-')) {
                        $fail('The :attribute must match the title.');
                    }
                },
            ],
            'content' => 'required|string|max:255',
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