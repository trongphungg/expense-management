<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Đăng Nhập - Quản lý Chi Tiêu</title>
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #007BFF; /* Màu xanh dương */
            color: white;
        }

        .login-form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            max-width: 400px;
            margin: 100px auto;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            color: black;
        }

        .menu-icon {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 24px;
            cursor: pointer;
            color: white;
        }

        .side-menu {
            position: fixed;
            left: -250px;
            top: 0;
            width: 250px;
            height: 100%;
            background-color: #343a40;
            color: white;
            transition: left 0.3s ease;
            padding-top: 60px;
        }

        .side-menu a {
            display: block;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
        }

        .side-menu a:hover {
            background-color: #495057;
        }

        .side-menu .close-btn {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 30px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <h3 class="text-center mb-4">Đăng Nhập</h3>
        <form method="POST" action="{{route('login')}}">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Tên đăng nhập</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Đăng Nhập</button>
        </form>
    </div>
</body>
</html>
