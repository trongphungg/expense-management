@extends('layout.app')

@section('content')
<div class="container mt-4 overflow-auto" style="max-height: 90vh;">
    <h2 style="padding-top: 25px">Xin chào, {{$user->name}} .
      <br/>Dưới đây là lịch sử chi tiêu của bạn</h2>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên</th>
            <th scope="col">Ngày mua</th>
            <th scope="col">Ghi chú</th>
            <th scope="col">Giá tiền</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        @foreach($data as $a)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$a->name}}</td>
            <td>{{ \Carbon\Carbon::parse($a->date)->format('d/m/Y') }}</td>
            <td>{{$a->note}}</td>
            <td>{{$a->price}} $</td>
            <td><a>Xoá</a></td>
          </tr>
        @endforeach
        <tr>
            <td colspan="4">Tổng chi tiêu trong tháng này: </td>
            <td colspan="2"> @php
              $tongtien =0;
              foreach($data as $a)
                  $tongtien +=$a->price;
              echo $tongtien;
  
          @endphp $</td>
          </tr>
        </tbody>
      </table>
</div>
@endsection