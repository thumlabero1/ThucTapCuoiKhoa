<?php

namespace App\Http\Requests\CategoryBlog;

use Illuminate\Foundation\Http\FormRequest;

class CategoryBlogRequest extends FormRequest
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
            "name" => "required|max:255",
            "description" => "required",
            "content" => "required",
            'thumb' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Vui lòng nhập tên danh mục",
            'name.max:255' => "Tên danh mục không dài quá 255 ki tu",
            'description.required' => "Vui lòng nhập mô tả",
            'content.required' => "Vui lòng nhập nội dung",
            'thumb.required' => "Vui lòng upload hình ảnh"
        ];
    }
}
