<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Báo Quản Lý Chi Tiêu</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            max-width: 600px;
            width: 90%;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            backdrop-filter: blur(10px);
            text-align: center;
        }

        h2 {
            font-size: 28px;
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .message {
            font-size: 18px;
            color: #333;
            margin-top: 20px;
            line-height: 1.7;
        }

        .amount {
            font-size: 24px;
            font-weight: bold;
            color: #1abc9c;
            margin-top: 20px;
            display: inline-block;
        }

        .note {
            margin-top: 30px;
            font-size: 14px;
            color: #666;
        }

        .cta-button {
            margin-top: 30px;
            padding: 10px 25px;
            background-color: #2980b9;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .cta-button:hover {
            background-color: #3498db;
        }

        @media (max-width: 500px) {
            .container {
                padding: 25px;
            }

            h2 {
                font-size: 24px;
            }

            .amount {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Xin chào {{ $name }}</h2>
        <div class="message">
            Dựa vào phần mềm quản lý chi tiêu, chúng tôi muốn thông báo cho bạn:
            <br><br>
            @php
                if($flag == -1)
                    echo "👉 <strong>Bạn cần đóng thêm tiền sinh hoạt.</strong>";
                else if($flag == 1)
                    echo "🎉 <strong>Bạn được hoàn lại tiền sinh hoạt!</strong>";
                else
                    echo "✅ <strong>Bạn không cần đóng thêm tiền sinh hoạt.</strong>";
            @endphp
            <div class="amount">Số tiền: ${{ number_format(abs($sotien), 2) }}</div>
        </div>
        <div class="note">Cảm ơn bạn đã sử dụng hệ thống quản lý chi tiêu của chúng tôi.</div>

        {{-- Nếu bạn muốn có nút hành động --}}
        {{-- <a href="#" class="cta-button">Quay lại ứng dụng</a> --}}
    </div>
</body>
</html>
