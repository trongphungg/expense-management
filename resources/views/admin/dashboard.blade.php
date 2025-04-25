@extends('admin.layout')


@section('content')
<div class="container mt-4 overflow-auto" style="max-height: 90vh;">
    <h1 style="padding-top: 25px">Danh sách thành viên</h1>
    <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
        @foreach($dskh as $kh)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$kh->name}}</td>
            <td>{{$kh->email}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    <h1>Các chi phí bắt buộc</h1>
    <table class="table table-striped table-hover rounded-table ">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên</th>
            <th scope="col">Giá tiền</th>
          </tr>
        </thead>
        <tbody>
        @foreach($cpbb as $a)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$a->name}}</td>
            <td>{{$a->price}} $</td>
          </tr>
        @endforeach
          <tr>
            <td colspan="2">Tổng chi phí bắt buộc</td>
            <td>@php
              $tcp = 0;
              foreach($cpbb as $b)
                $tcp += $b->price;
              echo $tcp;
            @endphp $</td>
          </tr>
        </tbody>
    </table>

    <h1>Chi tiêu trong tháng</h1>
    <table class="table table-striped table-hover rounded-table ">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên</th>
            <th scope="col">Người mua</th>
            <th scope="col">Ngày mua</th>
            <th scope="col">Giá tiền</th>
          </tr>
        </thead>
        <tbody>
        @foreach($data as $a)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$a->name}}</td>
            <td>{{$a->user->name}}</td>
            <td>{{ \Carbon\Carbon::parse($a->date)->format('d/m/Y') }}</td>
            <td>{{$a->price}} $</td>
          </tr>
        @endforeach
          <tr>
            <td colspan="4">Tổng chi tiêu trong tháng này: </td>
            <td> @php
              $tongtien =0;
              foreach($data as $a)
                  $tongtien +=$a->price;
              foreach($expense as $b)
                  $tongtien +=$b->price;
  
  
              echo $tongtien;
  
          @endphp $</td>
          </tr>
        </tbody>
    </table>
    <div class="text-end mt-3" style="padding-bottom: 100px">
      <a href="{{ route('tattoan') }}" class="btn btn-info">Tất toán</a>
  </div>
</div>
@endsection