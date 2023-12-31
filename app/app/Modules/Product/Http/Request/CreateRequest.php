<?php

namespace App\Modules\Product\Http\Request;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'tags' => 'nullable|array|exists:tags,id',
            'name' => 'string|max:55',
            'description' => 'string',
            'price' => 'int',
            'image' => 'nullable|image',
            'category_id' => 'exists:categories,id'
        ];
    }
}
