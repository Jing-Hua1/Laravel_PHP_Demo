<?php

use App\Http\Controllers\Login;
use App\Http\Controllers\Regist;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
#首页路由
Route::get('/', function () {
    return view('welcome');
});

#建立路由 规则名+数组[类名，方法名] 控制器路由
use App\Http\Controllers\Ding;
Route::get("d1",[Ding::class,"test"]);
# 基本路由
Route::get("b1",function (){
    return "基本路由";
});
//视图路由
Route::view("/b2","test");

//执行首页路由
Route::get("index",[Ding::class,"index"]);

//数据库路由
Route::get("db",[Ding::class,"db_test"]);

use App\Http\Controllers\Student;

//学生信息列表
Route::get("/list",[Student::class,"list"]);
//删除学生信息
Route::get("/delete/{id}",[Student::class,"delete"]);
//添加学生信息
Route::get("/add",[Student::class,"add"]);
//保存学生信息
Route::post("/save",[Student::class,"save"]);
//登录表单路由
Route::view("/login","login/index");
//登录处理路由
Route::post("/process",[Login::class,"login1"]);
//修改信息
//进入修改信息页面
Route::view("/edit/{id}","student/edit");
Route::post("/update/{id}",[Student::class,"edit"]);

//进入注册页面
Route::view("/view_signup","login/signup");
//进行注册操作
Route::post("/register",[Regist::class,"Register"]);


