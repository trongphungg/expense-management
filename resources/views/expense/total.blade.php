@extends('layout.app')

@section('content')

<div>
    <h1 style="padding-top: 25px">Chi phí bắt buộc</h1>
    <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên</th>
            <th scope="col">Giá tiền</th>
          </tr>
        </thead>
        <tbody>
        @foreach($expense as $a)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$a->name}}</td>
            <td>{{$a->price}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
</div>
<div>
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
            <td>{{$a->date}}</td>
            <td>{{$a->price}}</td>
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
  
          @endphp</td>
          </tr>
        </tbody>
      </table>
      @if($user->id == 2)
        <a href="{{route('tattoan')}}" class="btn-TT btn btn-info">Tất toán</a>
      @endif
</div>
@endsection