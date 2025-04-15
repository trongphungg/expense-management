@extends('layout.app')

@section('content')
<div>
    <h1 style="padding-top: 25px">Lịch sử chi tiêu</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên</th>
            <th scope="col">Ngày mua</th>
            <th scope="col">Giá tiền</th>
          </tr>
        </thead>
        <tbody>
        @foreach($data as $a)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$a->name}}</td>
            <td>{{$a->date}}</td>
            <td>{{$a->price}}</td>
          </tr>
        @endforeach
        <tr>
            <td colspan="3">Tổng chi tiêu trong tháng này: </td>
            <td> @php
              $tongtien =0;
              foreach($data as $a)
                  $tongtien +=$a->price;
              echo $tongtien;
  
          @endphp</td>
          </tr>
        </tbody>
      </table>
</div>
@endsection