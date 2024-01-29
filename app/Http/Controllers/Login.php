<?php
namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;

class Login extends Controller{
    public function init()
    {

    }
    //
    public function login1(LoginRequest $request)
    {
        $post = $request->post();
        $rt =Admin::checkoutLogin($post);
        if($rt['error']==0)
        {
            Session::put("admin",$rt['info']);
            return showMessage(['success'=>$rt['msg'],'url'=>'/list','time'=>3]);
        }else{
            return showMessage(['error'=>$rt['msg'],"message"=>$rt['info'],"time"=>5]);
        }
    }


}
