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
  {{!! \app\Helpers\Helper::menus($menus) !!}}
  </tbody>
</table>

@endsection