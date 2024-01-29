<?php
namespace App\Http\Controllers;
#创建控制器
use Illuminate\Support\Facades\DB;
use function foo\func;

class Ding extends Controller {
    public function test()
    {
        dump("测试输出");
    }
    public function index()
    {
        //首页

        //渲染视图

        return view("ding/list");
    }
    public function db_test()
    {

        $list = DB::table("student")
            ->where(function ($query){

        })
            ->get();
        dump($list);
    }
}
?>
