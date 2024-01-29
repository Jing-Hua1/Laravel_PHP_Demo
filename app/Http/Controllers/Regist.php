<?php
namespace App\Http\Controllers;


use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regist extends Controller {
    public function init()
    {

    }

    public function Register(Request $request)
    {
        $post = $request->post();
        $count = DB::select("select count(*) as count from admin  where admin=?",[$post["username"]])[0]->count;
        if( $count >0)
        {
            dump("用户名已经存在了");
            return showMessage(['error' => "用户名已经存在了", 'url' => '/view_signup', 'time' => 3]);
        }
        if($post['password'] != $post['confirm_password'] ){
            dump("两次密码不一致，请重新输入");
            return showMessage(['error' => "密码不一致", 'url' => '/view_signup', 'time' => 3]);
        }

        $admin = Admin::RegistAdmin($post);
        if ($admin['error'] == 0) {
            return showMessage(['success' => $admin['msg'], 'url' => '/login', 'time' => 3]);
        } else {
            return showMessage(['error' => $admin['msg'], 'url' => '/view_signup', 'time' => 3]);
        }
    }

}

?>
