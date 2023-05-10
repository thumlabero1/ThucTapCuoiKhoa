<?php

namespace App\Http\Requests\Employees;

use Illuminate\Foundation\Http\FormRequest;

class EmployeesRequest extends FormRequest
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
            "name" => "required",
            //"url" => "required",
            //"thumb" => "required",
            //"sort_by" => "required"
        ];
    }
    public function messages()
    {
        return [
            "name.required" => "Vui lòng nhập tên ",
            //"url.required" => "Vui lòng nhập url",
            //"thumb.required" => "Vui lòng upload hình ảnh",
            //"sort_by.required" => "Vui lòng nhập thứ tự",
        ];
    }
}
