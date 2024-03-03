<?php

namespace App\Http\Requests\BookLanguage;

use Illuminate\Foundation\Http\FormRequest;


class UpdateBookLanguageRequest extends FormRequest
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
            'icon_id' => 'nullable|integer|min:-2147483648|max:2147483647',
            'status' => 'nullable|integer|min:-2147483648|max:2147483647',
            'name' => 'nullable|string',
            'slug' => 'nullable|string'
        ];
    }
}
