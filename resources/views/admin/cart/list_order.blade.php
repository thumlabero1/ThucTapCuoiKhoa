@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th style="width: 150px">Mã đơn hàng</th>
                <th>Mã Khách hàng</th>
                <th>Trạng thái</th>
                {{-- <th>Email</th> --}}
                <th>Ngày đặt</th>

                <th>Chi tiết</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer_id }}</td>

                    <td>{{ $order->status == 1 ? 'Đã giao' : 'Chờ xác nhận...' }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        <a class="btn btn-primary" href="/admin/orders/view/{{ $order->id }}"><i class="fa fa-eye"
                                aria-hidden="true"></i></a>
                        {{-- <a class="btn btn-danger" href="#"
                            onclick="removeRow({{ $order->id }},'/admin/orders/destroy')"><i class="fas fa-trash"></i></a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
