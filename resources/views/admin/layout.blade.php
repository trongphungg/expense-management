<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Trang Chính - Quản lý Chi Tiêu</title>
    <link href="{{ asset ('assets/css/style.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" style="margin-top: 70px;">
            <div class="container-fluid">
              <a class="navbar-brand">Quản trị viên</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard')}}">Trang chủ</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('create')}}">Thêm thành viên</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('createExpense')}}">Thêm chi phí mỗi tháng</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('password')}}">Đổi mật khẩu</a>
                  </li>
              </div>
            </div>
        </nav>

        <div class="content-wrapper">
          @yield('content')
      </div>
    </div>
    <script src="{{asset('assets/js/main.js')}}">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.min.js" integrity="sha384-VQqxDN0EQCkWoxt/0vsQvZswzTHUVOImccYmSyhJTp7kGtPed0Qcx8rK9h9YEgx+" crossorigin="anonymous"></script>
</body>
</html>