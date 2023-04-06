@extends('admin.main')
@section('head')
@endsection

@section('content')
<table class="table table-striped">
  <thead>
    <tr>
      <th class="text-white">Tên sản phẩm</th>
      <th class="text-white">Mô tả</th>
      <th class="text-white">Giá</th>
      <th class="text-white">Chất lượng</th>
      <th class="text-white">Nhà cung cấp</th>
    </tr>
  </thead>
  <tbody>
  @foreach($Products->sortBy('id') as $Product)
  <tr>
        <td class ="text-white">{{$Product->id}}</td>
        <td class ="text-white">{{$Product->ProductName}}</td>
        <td class ="text-white">{{$Product->Description}}</td>
        <td class ="text-white">{{$Product->Price}}</td>
        <td class ="text-white">{{$Product->Quantity}}</td>
        <td class ="text-white">{{$Product->Manufacturer}}</td>
        <td class="btn btn-warning"><a href="/admin/Product/edit/{{$Product->id}}"><i class='fas fa-edit'></i></a></td>
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