@extends('admin.layout')

@section('content')
<div class="div-form container">
  <h5>Thêm chi phí</h5>
<form  action="{{route('handleCreateExpense')}}" method="POST">
  @csrf
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Tên chi phí</label>
        <input type="text" class="form-control" name="name" id="name" required>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Giá tiền</label>
        <input type="text" class="form-control" name="price" id="price" required>
      </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
  </form>

  <table class="table table-striped table-hover rounded-table ">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Tên</th>
        <th scope="col">Giá tiền</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach($cpbb as $a)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$a->name}}</td>
        <td>{{$a->price}} $</td>
        <td><a href="{{route('deleteExpense',$a->id)}}" type="button" class="btn btn-outline-danger">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"></path>
<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"></path>
</svg>
        </a></td>
      </tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection