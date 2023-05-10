@extends('admin.main')
@section('content')
    <h1>Danh sách nhân viên</h1>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên nhân viên</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Chức vụ</th>
                <th>Cập nhật</th>
                <th>Cài đặt</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>{{ $employee->updated_at }}</td>
                    <td>
                    <a class="btn btn-primary" href="/admin/employees/edit/{{ $employee->id }}"><i
                                class="fas fa-edit"></i></a>
                        <a class="btn btn-danger" href="#"
                            onclick="removeRow({{ $employee->id }},'/admin/employees/destroy')"><i
                                class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $employees->links() !!}
@endsection
