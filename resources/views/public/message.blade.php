<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ URL::asset('stu/js/jquery-1.8.3.js') }}"></script>
    <style type="text/css">
        body {
            background-color: #fff;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .showMsg {
            border: 1px solid #1e64c8;
            width: 450px;
            height: 172px;
            position: relative;
            text-align: center;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .showMsg h5 {
            margin: 0;
            background-image: url('{{ asset('images/message/msg.png') }}');
            background-repeat: no-repeat;
            color: #fff;
            padding-left: 35px;
            height: 25px;
            line-height: 26px;
            overflow: hidden;
            font-size: 14px;
            text-align: left;
        }

        .showMsg .content {
            padding: 20px;
            font-size: 14px;
            display: inline-block;
            text-align: left;
        }

        .showMsg .bottom {
            background: #e4ecf7;
            line-height: 26px;
            height: 26px;
            text-align: center;
        }

        .showMsg .ok,
        .showMsg .guery {
            background: url('{{ asset('images/message/msg_bg.png') }}') no-repeat 0px -560px;
        }

        .showMsg .guery {
            background-position: left -460px;
        }

        #ti {
            color: #171717;
            font-size: 18px;
            margin: 10px 20px;
        }

        .hiht {
            display: block;
            height: 30px;
            font-size: 18px;
            margin-bottom: 10px;
            color: {{ ($data['status'] == 1) ? '#29A50D' : 'red' }};
        }
    </style>
</head>
<body>

<div class="panel-body">
    <div class="showMsg">
        <div id='ti'><br>&nbsp;&nbsp;提示信息</div>
        <div class="content guery">
            <span class="hiht">{{ $data['message'] }}</span>
            <div>将在<span class="loginTime" style="color: red">{{ $data['jumpTime'] }}</span>秒后跳转</div>
        </div>
        <div class="bottom">
            @if($data['url'] == 'goback')

            @else
                <a href="{{ $data['url'] }}">如果您的浏览器没有自动跳转，请点击这里</a>
            @endif
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        var url = "{{$data['url']}}"
        var loginTime = parseInt($('.loginTime').text());
        var time = setInterval(function(){
            loginTime = loginTime-1;
            $('.loginTime').text(loginTime);
            if(loginTime==0){
                clearInterval(time);
                window.location.href=url;
            }
        },1000);
    })
</script>

</body>
</html>
