<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel = "stylesheet" href="../public/css/index.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h1 {
            color: #007BFF;
            text-align: center;
            margin-top: 20px;
        }

        form {
            margin-bottom: 20px;
            text-align: center;
        }

        input[type="text"],
        input[type="radio"],
        input[type="checkbox"],
        button {
            margin: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 8px;
        }

        input[type="text"] {
            width: 200px;
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin-right: 5px;
        }

        button {
            padding: 10px 15px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            margin-right: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        img {
            max-width: 50px;
            max-height: 50px;
            border-radius: 50%;
        }

        .pagination-container {
            margin: 20px 0;
            text-align: center;
        }

        .pagination {
            display: inline-block;
            margin: 0;
            padding: 0;
        }

        .pagination a {
            display: inline-block;
            padding: 10px 15px;
            text-decoration: none;
            color: #007BFF;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-right: 5px;
            transition: background-color 0.3s ease;
        }

        .pagination a:hover {
            background-color: #007BFF;
            color: #fff;
        }

        .pagination .active a {
            background-color: #007BFF;
            color: #fff;
        }

        .pagination .disabled a {
            color: #ddd;
            cursor: not-allowed;
        }
    </style>
    <title>学生列表</title>
</head>

<body>
<h1>学生列表</h1>
<form action="/list" method="get">
    <label for="key">姓名 :</label>
    <input type="text" name="key" id="key" value="{{$gets['key']??''}}">
    <label for="male">男</label>
    <input type="radio" name="sex" id="male" value="男" {{($gets['sex']??'')=='男'?'checked':''}}>
    <label for="female">女</label>
    <input type="radio" name="sex" id="female" value="女" {{($gets['sex']??'')=='女'?'checked':''}}>
    <br>
    <label for="major">专业 :</label>
    @foreach($Major as $v)
        <input type="checkbox" name="mjs[]" value="{{$v['id']}}" {{in_array($v['id'], ($get['mjs']??[])) ? 'checked' : ''}}> {{$v['major']}}
    @endforeach
    <br>
    <button>搜索</button>
</form>
<a href="/add">
    <button style="background-color: #28a745;">添加</button>
</a>
<table border="1">
    <tr>
        <th>学号</th>
        <th>姓名</th>
        <th>头像</th>
        <th>性别</th>
        <th>年龄</th>
        <th>专业</th>
        <th>操作</th>
    </tr>
    @forelse($list as $v)
        <tr>
            <td>{{$v->id}}</td>
            <td>{{$v['name']}}</td>
            <td>
                <img src="/uploads/{{$v['head_img']}}" width="50px" height="50px" alt="">
            </td>
            <td>{{$v['sex']}}</td>
            <td>{{$v['age']}}</td>
            <td>{{$v['major']}}</td>
            <td>
                {{-- 删除跳页时携带搜索条件--}}
                {{-- http_build_query(数组) 将数组转为地址栏参数--}}
                <a href="/delete/{{$v['id']}}?{{http_build_query($gets)}}">删除</a>
                <a href="/edit/{{$v['id']}}">修改</a>
            </td>
        </tr>
    @empty
        <tr>
            <th colspan="8">暂无数据</th>
        </tr>
    @endforelse
    <tr>
        <td colspan="8" class="pagination-container">
            {{-- 数据集对象中的links方法获取分页链接 --}}
            {{-- 使用withQueryString将分页链接中携带搜索参数 --}}
            {{$list->withQueryString()->links()}}
        </td>
    </tr>

</table>
</body>

</html>
