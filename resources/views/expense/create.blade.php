@extends('layout.app')
@section('content')
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
<div class="container mt-4">
    <img src="https://cdn-icons-png.flaticon.com/512/3050/3050525.png" alt="Expense Tracker" class="header-img">
    <h2>Quản lý Chi Tiêu</h2>
    
    <h5>Xin chào {{$user->name}}</h5>
    <!-- Form thêm chi tiêu -->
    <form id="expenseForm" class="mb-3">
        <input type="text" id="id" hidden value="{{$user->id}}">
        <div class="mb-2">
            <label for="category" class="form-label">Danh mục</label>
            <select class="form-select" id="name">
                <option value="Ăn uống">Ăn uống</option>
                <option value="Mua sắm">Mua sắm</option>
                <option value="Hóa đơn">Hóa đơn</option>
            </select>
        </div>
        <div class="mb-2">
            <label for="amount" class="form-label">Số tiền</label>
            <input type="number" class="form-control" id="price" required>
        </div>
        <div class="mb-2">
            <label for="date" class="form-label">Ngày tháng</label>
            <input type="date" class="form-control" id="date" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Thêm Chi Tiêu</button>
    </form>
    
    <!-- Bảng hiển thị danh sách chi tiêu -->
    <h4>Danh sách Chi Tiêu</h4>
    <ul id="expenseList" class="list-group"></ul>
    
    <!-- Tổng kết chi tiêu -->
    <div class="mt-3">
        <h5>Tổng tiền: <span id="totalAmount">0</span> VNĐ</h5>
    </div>
</div>
@endsection