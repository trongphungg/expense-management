<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Chi Tiêu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #ff9966, #ff5e62);
            color: white;
        }
        .container {
            background: rgba(255, 255, 255, 0.2);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        h2 {
            text-align: center;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #ff4b2b;
            border: none;
        }
        .btn-primary:hover {
            background-color: #ff416c;
        }
        .list-group-item {
            background: rgba(255, 255, 255, 0.8);
            color: black;
        }
        .header-img {
            display: block;
            margin: 0 auto 10px;
            width: 80px;
            height: 80px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <img src="https://cdn-icons-png.flaticon.com/512/3050/3050525.png" alt="Expense Tracker" class="header-img">
        <h2>Quản lý Chi Tiêu</h2>
        
        <!-- Form thêm chi tiêu -->
        <form id="expenseForm" class="mb-3">
            <div class="mb-2">
                <label for="amount" class="form-label">Số tiền</label>
                <input type="number" class="form-control" id="amount" required>
            </div>
            <div class="mb-2">
                <label for="category" class="form-label">Danh mục</label>
                <select class="form-select" id="category">
                    <option value="Ăn uống">Ăn uống</option>
                    <option value="Mua sắm">Mua sắm</option>
                    <option value="Hóa đơn">Hóa đơn</option>
                    <option value="Khác">Khác</option>
                </select>
            </div>
            <div class="mb-2">
                <label for="date" class="form-label">Ngày tháng</label>
                <input type="date" class="form-control" id="date" required>
            </div>
            <div class="mb-2">
                <label for="note" class="form-label">Ghi chú</label>
                <input type="text" class="form-control" id="note">
            </div>
            <button type="submit" class="btn btn-primary w-100">Thêm Chi Tiêu</button>
        </form>
        
        <!-- Bảng hiển thị danh sách chi tiêu -->
        <h4>Danh sách Chi Tiêu</h4>
        <ul id="expenseList" class="list-group"></ul>
        
        <!-- Tổng kết chi tiêu -->
        <div class="mt-3">
            <h5>Tổng chi tiêu tháng: <span id="totalAmount">0</span> VNĐ</h5>
        </div>
    </div>
    
    <script>
        document.getElementById('expenseForm').addEventListener('submit', function(event) {
            event.preventDefault();
            let amount = document.getElementById('amount').value;
            let category = document.getElementById('category').value;
            let date = document.getElementById('date').value;
            let note = document.getElementById('note').value;
            
            if (amount && date) {
                let expenseList = document.getElementById('expenseList');
                let listItem = document.createElement('li');
                listItem.className = 'list-group-item';
                listItem.innerHTML = `<strong>${amount} VNĐ</strong> - ${category} - ${date} - ${note}`;
                expenseList.appendChild(listItem);
                
                let totalAmount = document.getElementById('totalAmount');
                totalAmount.textContent = parseInt(totalAmount.textContent) + parseInt(amount);
            }
        });
    </script>
    
</body>
</html>