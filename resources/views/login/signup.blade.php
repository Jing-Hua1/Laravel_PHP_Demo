<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>用户注册</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #74ebd5, #acb6e5);
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
        }

        h1 {
            color: #fff;
            text-align: center;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        form {
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease-in-out;
            border: 1px solid #ddd;
        }

        input {
            margin-bottom: 15px;
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: all 0.3s ease-in-out;
        }

        input:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }

        button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease-in-out;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        button:hover {
            background-color: #2980b9;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }

        .alert {
            background-color: #e74c3c;
            color: white;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            animation: fadeIn 0.5s ease-in-out;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        img {
            display: block;
            margin: 10px auto;
        }

        @keyframes fadeIn {
            from {
                transform: scale(0.9);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
</head>
<body>

<h1>用户注册</h1>

<form action="/register" method="post">
    @csrf
    用户名: <input type="text" name="username" required> <br>
    密码: <input type="password" name="password" required> <br>
    确认密码: <input type="password" name="confirm_password" required> <br>
    <button>注册</button>
</form>

</body>
</html>
