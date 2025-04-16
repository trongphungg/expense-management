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