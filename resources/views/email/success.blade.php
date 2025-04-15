<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Xin chào {{$name}}</h2>
    <h3>Dựa vào phần mềm quản lí chi tiêu. Chúng tôi muốn thông báo cho bạn về việc.
        @php
            if($flag == -1)
                echo "Bạn cần đóng thêm vào tiền sinh hoạt ";
            else if($flag == 1)
                echo "Bạn được nhận về ";
            else echo "Bạn không cần đóng thêm tiền sinh hoạt";
        @endphp
        với số tiền: {{abs($sotien)}}</h3>
</body>
</html>