@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên bài viết</th>
                <th>Danh mục</th>
                <th>Active</th>
                <th>Update</th>
                <th>Cài đặt</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td>{{ $blog->name }}</td>
                    <td>{{ $blog->category->name }}</td>
                    <td> {!! \App\Helpers\Helper::isActive($blog->active) !!}</td>
                    <td>{{ $blog->updated_at }}</td>
                    <td>
                        <a class="btn btn-primary" href="/admin/blogs/edit/{{ $blog->id }}"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger" href="#"
                            onclick="removeRow({{ $blog->id }},'/admin/blogs/destroy')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
