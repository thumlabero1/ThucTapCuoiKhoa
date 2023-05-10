@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tiêu đề slider</th>
                <th>Trạng thái</th>
                <th>Thứ tự</th>
                <th>Cập nhật</th>
                <th>Cài đặt</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sliders as $slider)
                <tr>
                    <td>{{ $slider->id }}</td>
                    <td>{{ $slider->name }}</td>
                    <td> {!! \App\Helpers\Helper::isActive($slider->active) !!}</td>
                    <td>{{ $slider->sort_by }}</td>
                    <td>{{ $slider->updated_at }}</td>
                    <td>
                        <a class="btn btn-primary" href="/admin/sliders/edit/{{ $slider->id }}"><i
                                class="fas fa-edit"></i></a>
                        <a class="btn btn-danger" href="#"
                            onclick="removeRow({{ $slider->id }},'/admin/sliders/destroy')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $sliders->links() !!}
@endsection
