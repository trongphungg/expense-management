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
            Số tiền bạn đã chi tiêu cho gia đình trong tháng này là: {{ number_format(abs($ctcn), 2) }} $;
            <br/>
            Số tiền trung bình mà mỗi thành viên cần đóng trong tháng này là: {{ number_format(abs($tbtien), 2) }} $;
            <br/>
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
         <div class="expense-table" style="margin-top: 40px;">
            <h3 style="color: #2c3e50; font-size: 22px; margin-bottom: 20px;">Chi tiết chi tiêu của các thành viên</h3>
            <table style="width: 100%; border-collapse: collapse; background-color: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                <thead style="background-color: #2980b9; color: #fff;">
                    <tr>
                        <th style="padding: 12px;">STT</th>
                        <th style="padding: 12px;">Tên thành viên</th>
                        <th style="padding: 12px;">Chi tiêu ($)</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($dstiendong as $index => $price)
                        <tr style="text-align: center; border-bottom: 1px solid #ddd;">
                            <th scope="row">{{$loop->iteration}}</th>
                            <td style="padding: 10px;">{{ $dskh[$index]->name ?? 'Không rõ tên'}}</td>
                            <td style="padding: 10px;">{{ number_format($price, 2) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3"> Lưu ý: Với dấu trừ trước ở trước đồng nghĩa với việc thành viên cần đóng tiền.
                            Ngược lại thành viên đó được hoàn tiền.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
