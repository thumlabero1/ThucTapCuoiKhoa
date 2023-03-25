@extends('admin.main')
@section('head')
@endsection

@section('content')
<table class="table table-striped">
  <thead>
    <tr>
      <th class="text-white">ID</th>
      <th class="text-white">Name</th>
      <th class="text-white">Active</th>
      <th class="text-white">Updated At</th>
    </tr>
  </thead>
  <tbody>
  <!-- {{!! \app\Helpers\Helper::menu($menus) !!}} -->
  @foreach($menus->sortBy('id') as $menu)
  <tr>
        <td class ="text-white">{{$menu->id}}</td>
        <td class ="text-white">{{$menu->name}}</td>
        <td class ="text-white">{{$menu->active}}</td>
        <td class ="text-white">{{$menu->updated_at}}</td>
        <td class="btn btn-warning"><a href="/admin/menus/edit/{{$menu->id}}"><i class='fas fa-edit'></i></a></td>
        <td class ="btn btn-danger"><a href="" onclick="removeRow(
          '{{ $menu->id }}','\/admin/menus/destroy\'
          )"><i class='fa fa-trash' 
        ></i></a></td>
</td>
  </tr>       
  @endforeach
  </tbody>
</table>

@endsection