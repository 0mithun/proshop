<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id'       => 'required|numeric|not_in:0',
            'brand_id'       => 'required|numeric|not_in:0',
            'name'      => 'required|max:255',
            'code'      => 'required|max:255',
            'quantity'      => 'required|numeric|not_in:0',
            'price'      => 'required|numeric|not_in:0',
            'detail'      => 'required',
            'image_one'      => 'required|max:1024|mimes:jpeg,bmp,png',
            'image_two'      => 'max:1024|mimes:jpeg,bmp,png',
            'image_three'      => 'max:1024|mimes:jpeg,bmp,png',
        ];
    }
}
