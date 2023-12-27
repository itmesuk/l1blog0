<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            // 'image' => 'mimes:jpeg, jpg, png',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'กรุณาระบบชื่อสินค้า',
            'price.required' => 'กรุณากำหนดราคาสินค้า',
            'stock.required' => 'กรุณาระบบจำนวนสินค้าที่มีในสต๊อก',
            // 'image.mimes' => 'รองรับไฟล์รูปนามสกุล jpeg, jpg, png'
        ];
    }
}
