<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            "description" => 'required',
            "content" => "required",
            "price" => "required",
            "price_sale" => "required",
            'thumb' => 'required',
            "menu_id" => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Vui lòng nhập tên sản phẩm",
            'description.required' => "Vui lòng mô tả",
            'thumb.required' => "Vui lòng upload hình ảnh",
            'content.required' => "Vui lòng nhập nội dung",
            'price.required' => "Vui lòng nhập giá",
            "menu_id.required" => "Vui lòng chọn danh mục"
        ];
    }
}
