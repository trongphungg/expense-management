@extends('admin.layout')

@section('content')
<div class="div-form container">
  <h5>Thay đổi mật khẩu</h5>
<form  action="{{route('handleChangePass')}}" method="POST">
  @csrf
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Email</label>
        <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}" readonly>
      </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Mật khẩu mới</label>
      <input type="password" class="form-control" name="password" id="password" aria-describedby="emailHelp" required>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật mật khẩu</button>
  </form>
</div>
@endsection