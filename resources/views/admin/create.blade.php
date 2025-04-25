@extends('admin.layout')

@section('content')
<div class="container mt-4 overflow-auto" style="max-height: 90vh;">
  {{-- @if(session('success') || session('error'))
  <div class="div-form container">
      @if(session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif
  
      @if(session('error'))
          <div class="alert alert-danger">
              {{ $errors->first() }}
          </div>
      @endif
  </div>
  @endif --}}
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
        <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach($dskh as $kh)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$kh->name}}</td>
        <td>{{$kh->email}} 
        </td>
        <td><a href="{{route('deleteUser',$kh->id)}}" type="button" class="btn btn-outline-danger">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"></path>
<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"></path>
</svg>
        </a>
      </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
</div>
</div>
</div>
@endsection