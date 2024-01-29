<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
class Admin extends Model
{
    protected $table = "admin";
    protected $primaryKey = "id";
    protected $fillable = ['admin', 'pwd', 'times'];

    // 设置默认值
    protected $attributes = [
        'times' => 0,
    ];


    public $timestamps = false;

    public static function checkoutLogin($post)
    {
        try {
            $one = self::where("admin",$post['user'])
                ->where('pwd',$post['pwd'])
                ->first();
            if($one){
                $data=[
                "ip"=>Request::ip(),
                "login_time"=>time(),
                "times"=>DB::raw("times+1")
                ];
                self::where("id",$one->id)->update($data);
                $arr=['error'=>0,"msg"=>"登陆成功","info"=>$one];
            }else{
                $arr=['error'=>1,'msg'=>'用户名或者密码错误'];
            }
        }catch (\Exception $e){
                $arr=['error'=>2,'msg'=>"登录异常，请重新查看","info"=>$e];
        }
        return $arr;
    }
    //用户进行注册
    public static function RegistAdmin($post)
    {
        try{
            $user = new Admin();
            $user->admin = $post["username"];
            $user->pwd = bcrypt($post["password"]);
            $user->save();
            $arr = ['error' => 0, 'msg' => '注册成功', 'info' => $user];
        }catch (\Exception $e)
        {
            $arr = ['error' => 2, 'msg' => '注册异常，请重新尝试', 'info' => $e];
            dump($e);
        }
        return $arr;
    }

}
