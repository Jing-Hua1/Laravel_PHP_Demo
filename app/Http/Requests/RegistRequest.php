<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistRequest extends FormRequest
{
    public  function authorize():bool
    {
        return true;
    }

    public function rules(){
        return [
            "user"=>"required",
            "password"=>"required",
        ];
    }

    public function message()
    {
        return[
            "user.required"=>"用户名需要填写",
            "password.required"=>"密码需要填写",
        ];
    }
}

?>
