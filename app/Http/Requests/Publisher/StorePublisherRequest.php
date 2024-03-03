<?php

namespace App\Http\Requests\Publisher;

use Illuminate\Foundation\Http\FormRequest;


class StorePublisherRequest extends FormRequest
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
            'status' => 'integer|min:-2147483648|max:2147483647',
            'name' => 'required|string',
            'slug' => 'nullable|string'
        ];
    }
}
