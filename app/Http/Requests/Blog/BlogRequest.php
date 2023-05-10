<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'thumb' => 'required',
            "category_blog_id" => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Vui lòng nhập tên sản phẩm",
            'description.required' => "Vui lòng mô tả",
            'thumb.required' => "Vui lòng upload hình ảnh",
            'content.required' => "Vui lòng nhập nội dung",
            "category_blog_id.required" => "Vui lòng chọn danh mục"
        ];
    }
}
