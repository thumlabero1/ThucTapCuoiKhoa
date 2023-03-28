@extends('admin.main')
@section('head')
@endsection

@section('content')
<h2 class="text-white text-center">Sua danh mục</h2>
@foreach($menus->sortBy('id') as $menu)
  <form method="POST" action="{{ route('menus.update', $menu->id) }}">
  @csrf
  <div class="form-group mb-3">
  <label for="menu" class="form-label text-white font-weight-bold">Name:</label>
  <input type="text" class="form-control" name="name" id="name" value="{{ $menu->name }}">
  </div>
  <br>
  <div class="form-group mb-3" >
  <label for="menu" class="form-label text-white font-weight-bold">description:</label>
  <input type="text" class="form-control" name="description" id="description" value="{{ $menu->description }}">
  </div>
  <br>
  <div class="mb-3 content" id=content>
      <label for="menu" class="form-label text-white font-weight-bold">Mô tả chi tiết</label>
      <textarea name="content" class="form-control" id="content"></textarea>
    </div>
  
  <br>
  <button type="submit" class="btn btn-success">Save</button>
</form>
@endforeach
<script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection