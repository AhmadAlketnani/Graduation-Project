<?php

namespace App\Http\Requests\Dashboard;

use App\Models\Dashboard\Product;
use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
        return [
                'name_en' => 'required|string|max:255',
                'name_ar' => 'required|string|max:255',
                'price' => 'required|numeric',
                'images' => 'required|array',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'QTY' => 'required|integer',
                'description_en' => 'nullable|string',
                'description_ar' => 'nullable|string',
                'status' => "required|in:".Product::STATUS_ACTIVE,Product::STATUS_INACTIVE,
                'store_id' => 'required|exists:stores,id',
                'categories' => 'required|array',
                'categories.*' => 'exists:categories,id',

        ];
    }
}
