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
            <td><a href="{{route('deleteDetail',$a->id)}}" type="button" class="btn btn-outline-danger">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"></path>
    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"></path>
    </svg>
            </a>
          </td>
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