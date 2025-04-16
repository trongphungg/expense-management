@extends('admin.layout')

@section('content')
<div class="div-form container">
  <h5>Thêm thành viên</h5>
<form  action="{{route('handleCreate')}}" method="POST">
  @csrf
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Tên thành viên</label>
        <input type="text" class="form-control" name="name" id="name" required>
      </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Địa chỉ email</label>
      <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
  </form>

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
</div>
@endsection