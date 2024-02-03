<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'title' => [
                'required',
                'string',
                'max:200'
            ],
            'preview' => [
                'string',
                'max:500'
            ],
            'slug' => [
                'required',
                'string',
                'max:200'
            ],
            'body' => [
                'required'
            ],
            'image_path' => [
                'nullable',
            ],
            'image_alt' => [
                'required',
                'string',
                'max:200'
            ],
            'meta_title' => [
                'required',
                'string',
                'max:200'
            ],
            'meta_description' => [
                'required',
                'string'
            ],
            'meta_keyword' => [
                'required',
                'string'
            ],
            'status' => [
                'nullable'
            ],
            'category_id' => [
                'required',
                'integer'
            ]
        ];

        return $rules;
    }
}
