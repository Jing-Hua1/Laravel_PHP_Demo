<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            "user"=>"required",
            "pwd"=>"required",
            "code"=>"required|captcha"
        ];
    }
    public function message()
    {
        return[
            "user.required"=>"用户名需要填写",
            "pwd.required"=>"密码需要填写",
            "code.required"=>"验证码需要填写"
            ];
    }
}
