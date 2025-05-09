<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Trang Chính - Quản lý Chi Tiêu</title>
    <link href="{{ asset ('assets/css/style.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="menu-icon" onclick="toggleMenu()">
        <i class="fas fa-bars"></i>
    </div>

    <div class="side-menu" id="sideMenu">
        <span class="close-btn" onclick="toggleMenu()">&times;</span>
        <a href="#">Trang Chủ</a>
        <a href="#">Quản lý Chi Tiêu</a>
    </div>
    <div class="container">
        <div class="grid-container">
            @if($data)
            @foreach($data as $a)
                <a href="{{route('dangnhap',$a->id)}}" style="text-decoration: none">
                <div class="main-card">
                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Avatar" class="main-avatar">
                    {{-- <img src="{{asset('assets/img/'.$a->image)}}" alt="Avatar" class="main-avatar"> --}}
                    <h5>{{$a->name}}</h5>
                </div>
            </a>
            @endforeach
            @endif
            
        </div>
    </div>
    <script src="{{asset('assets/js/main.js')}}">
    </script>
    
</body>
</html>