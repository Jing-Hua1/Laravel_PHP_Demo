<?php
namespace App\Http\Controllers;
use App\Http\Requests\StudentRequest;
use App\Models\Admin;
use App\Models\Major;
use App\Models\Student as StudentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Student extends Controller{
    protected $table = "student";
    protected  $primaryKey = "id";
    protected $fillable = ['name', 'head_img', 'sex',"age","m_id","birthday"];
    //首页
    public $timestamps = false;

    public function list(Request $request)
    {
        $gets = $request->query();
        $majors = Major::get();
        //查询学生信息
        $list = StudentModel::list($gets);
        return view(
            "student/list",
            ['list'=>$list,"gets"=>$gets,"Major"=>$majors]
        );
    }
    public function delete($id,Request $request)
    {
        $gets = $request->query();
        $rt = StudentModel::del($id);
        if($rt['error'] == 0){ //跳转至首页
            return showMessage(['message'=>$rt['msg'],'success'=>"ok","url" => "/list?" .http_build_query($gets),"time" => 3]);
        }else{
            return showMessage(['error'=>$rt['msg'],"time "=> 5]);
        }
    }

    //添加请求表单信息
    public function add(Request $request)
    {
        $majors = Major::get();
        return view(
            "student/add",
            ['majors'=>$majors]
        );
    }

    //在接受请求时，对数据进行验证
    //基础请求类，只能验证表单令牌
    //验证数据，需要自定义请求类
    public static function save(StudentRequest $request)
    {
        $gets = $request->post();
        $count = DB::select("select count(*) as count from admin  where admin=?",[$gets["name"]])[0]->count;
        if( $count >0)
        {
            dump("用户名已经存在了");
            return showMessage(['error' => "用户名已经存在了", 'url' => '/add', 'time' => 3]);
        }
        //去将数据存储到数据库中
       $file=$request->file('logo');//文件上传信息
       $rt = (new \App\Models\Student)->add1($gets,$file);
       if($rt['error'] ==0){
           return showMessage(["success"=>$rt['msg'],'url'=>'/list','time'=>3]);;
       }else{
           return showMessage(['failed'=>$rt['msg'],'time'=>4]);
       }
    }

    //修改信息
    public static function edit(Request $request)
    {
        $majors= Major::get();
        return view(
            "student/edit",
            ['majors'=>$majors]
        );
    }

    //修改信息
    public static function update(Request $request,$id)
    {
        try{
        $post = $request->post();
        // 根据主键查找要修改的记录
        // 根据主键查找要修改的记录
        $student = Student::find($id);


        $student->name = $post["name"];
        $student->head_img = $post["head_img"];
        $student->sex = $post["sex"];
        $student->age = $post["age"]; // 修正此处
        $student->birthday = $post["birthday"];
        $student->save();
            return showMessage(["success"=>"ok",'url'=>'/list','time'=>3]);;
        }catch (\Exception $e) {
            return showMessage(["error"=>"ok",'url'=>'/edit','time'=>3]);;
        }
        return $arr;
    }


}
