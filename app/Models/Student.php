<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    //关联表名
    use HasFactory;
    use SoftDeletes;
    protected $table = "student";
    protected $fillable = ["name","head_img","sex","age","m_id","birthday"];

    protected $primaryKey="id";
    //添加时设置不允许添加的字段
    protected $guarded = [];
    //关闭自动时间戳
    public $timestamps =false;
    //查询全部数据
    public static function list($gets){
        $obj=(new self())->setTable("s")
            ->from("student as s")
            ->join("major as m","s.m_id","=","m.id")
            ->select("m.major","s.id","s.name","s.sex","s.age",'s.head_img')
        ->orderby("s.id","desc");
//            ->whereNull('s.deleted_at');


        if(isset($gets['key']) and $gets['key'] != ""){
            $obj->where("s.name","like","%{$gets['key']}%");
        }
        if(isset($gets['sex']) and $gets['sex'] != ''){
            $obj->where("s.sex",$gets['sex']);
        }
        if(isset($gets['mjs']) and $gets['mjs'] != ''){
            $obj->whereIn("s.m_id",$gets['mjs']);
        }
        $list=$obj->paginate(10);
       return $list;
    }
    //删除数据
    public static function del($id){
        try {
            Student::where("id",$id)->delete();
//            Student::destroy($id);;
            $arr=["error"=>0,"msg"=>"success"];
        }catch(\Exception $e){
            $arr=["error"=>1,"msg"=>"系统错误","eMsg"=>$e->getMessage()];
        }
        return $arr;
    }
    //添加方法
    public function add1($post,$file): array
    {
        try {
            unset($post['_token']);
            if ($file == null || !$file->isValid()) {
                return ["error" => 2, "msg" => "无效或空的文件上传"];
            }
            $path = $file->store("images","wsb");
            $post['head_img'] = $path;
            Student::create($post);
            $arr=['error'=>0,"msg"=>"添加成功"];
        }catch (\Exception $e){
            $arr=["error"=>1,"msg"=>"系统错误","eMsg"=>$e->getMessage()];
        }
        return $arr;
    }
}
