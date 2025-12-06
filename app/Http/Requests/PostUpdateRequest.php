<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        $id = $this->route('id'); // <-- correct parameter

        return [
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('posts', 'title')->ignore($id),
            ],
            'description' => 'nullable|string',
            'attribute_id' => 'nullable|integer',
            'image' => 'nullable|image|mimes:png,jpg,webp,jpeg|max:2048',
        ];
    }
}
