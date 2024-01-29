<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            //
            "name" => "required|between:2,10",
            "sex" => "required",
            "age" => "required|integer|between:10,50",
            "birthday"=>"required|date",
            "m_id" => "required|integer"
        ];
    }
    public function message()
    {
        return [
            "name.required" =>"姓名不能为空",
            "sex.required" =>"性别不能为空",
            "age.required" => "年龄必须在10-50之间",
            "birthday.required" =>"生日不能为空",
            "m_id.required" =>"专业不能为空",
        ];
    }
}
