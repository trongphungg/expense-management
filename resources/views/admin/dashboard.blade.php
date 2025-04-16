@extends('admin.layout')


@section('content')
<div class="container mt-4 overflow-auto" style="max-height: 90vh; margin-bottom: 50px;">
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
        </tbody>
    </table>
</div>
@endsection