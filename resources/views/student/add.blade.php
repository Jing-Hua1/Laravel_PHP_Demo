<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>学生信息添加</title>
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

        form {
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease-in-out;
            border: 1px solid #ddd;
        }

        input, select, button {
            margin-bottom: 20px;
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: all 0.3s ease-in-out;
        }

        input:focus, select:focus, button:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input[type="radio"] {
            display: none;
        }

        .gender-label {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .gender-option {
            cursor: pointer;
            margin-right: 10px;
            padding: 8px;
            border: 2px solid #ccc;
            border-radius: 4px;
            transition: background-color 0.3s ease-in-out;
        }

        .gender-option:hover {
            background-color: #f0f0f0;
        }

        .gender-option.selected {
            background-color: #3498db;
            color: #fff;
            border-color: #3498db;
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

<form action="/save" method="post" enctype="multipart/form-data">
    @csrf
    <label for="name">姓名:</label>
    <input type="text" name="name" required>

    <label for="logo">头像:</label>
    <input type="file" name="logo" accept="image/*" required>

    <label>性别:</label>
    <div class="gender-label">
        <div class="gender-option" onclick="toggleGender(this, 'male')">男</div>
        <div class="gender-option" onclick="toggleGender(this, 'female')">女</div>
        <input type="radio" name="sex" id="male" value="男" style="display: none;" required>
        <input type="radio" name="sex" id="female" value="女" style="display: none;" required>
    </div>

    <label for="age">年龄:</label>
    <input type="number" name="age" required>

    <label for="birthday">生日:</label>
    <input type="date" name="birthday" required>

    <label for="m_id">专业:</label>
    <select name="m_id" id="" required>
        @foreach($majors as $v)
            <option value="{{$v['id']}}">{{$v['major']}}</option>
        @endforeach
    </select>

    <button>添加</button>
</form>

<script>
    function toggleGender(element, gender) {
        const radio = document.getElementById(gender);
        if (radio) {
            radio.checked = !radio.checked;
        }

        const options = document.querySelectorAll('.gender-option');
        options.forEach(option => option.classList.remove('selected'));
        element.classList.toggle('selected');
    }
</script>

</body>
</html>
