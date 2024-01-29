<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $this->init();
    }
    public function init()
    {
         //登录验证
        if(!Session::get("admin")){
            echo showMessage(['success'=>"请登录","url"=>"/login",'time'=>5]);
            exit;
        }
    }
}
