<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;


class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'parent_id' => 'integer|exists:categories,id',
            'status' => 'integer|in:1,2',
            'type' => 'integer|in:1,2',
            'name' => 'string',
        ];
    }
}
