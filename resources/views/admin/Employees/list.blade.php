@extends('admin.main')
@section('head')
@endsection

@section('content')
<table class="table table-striped">
  <thead>
    <tr>
      <th class="text-white">Mã nhân viên</th>
      <th class="text-white">Họ tên</th>
      <th class="text-white">Ngày sinh</th>
      <th class="text-white">Địa chỉ</th>
      <th class="text-white">Số điên thoại</th>
      <th class="text-white">Email</th>
      <th class="text-white">Chi tiết</th>
    </tr>
  </thead>
  <tbody>
  @foreach($Employees->sortBy('id') as $Employee)
  <tr>
        <td class ="text-white">{{$Employee->id}}</td>
        <td class ="text-white">{{$Employee->FullName}}</td>
        <td class ="text-white">{{$Employee->DOB}}</td>
        <td class ="text-white">{{$Employee->Address}}</td>
        <td class ="text-white">{{$Employee->PhoneNumber}}</td>
        <td class ="text-white">{{$Employee->Email}}</td>
        <td class="btn btn-warning"><a href="/admin/Employee/edit/{{$Employee->id}}"><i class='fas fa-edit'></i></a></td>
        <td>
            <form action="" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i></button>
            </form>
        </td>
  </tr>
  @endforeach
  </tbody>
</table>

@endsection