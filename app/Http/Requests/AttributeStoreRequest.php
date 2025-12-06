<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AttributeStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
        public function rules(): array
    {
        $rules = [
            'name' => [
                'required',
                Rule::unique('attributes')->where(function ($query) {
                    return $query->where('type', $this->route('type'));
                })
            ],
            'image'       => 'nullable|mimes:jpg,jpeg,png|max:4048',
        ];



        return $rules;
    }
}
