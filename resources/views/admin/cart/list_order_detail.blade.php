@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <div class="customer">
        <ul>
            <li>Tên khách hàng: <strong>{{ $user->name }}</strong></li>
            <li>Số điện thoại: <strong>{{ $user->phone }}</strong></li>
            <li>Địa chỉ: <strong>{{ $user->address }}</strong></li>
            <li>Email: <strong>{{ $user->email }}</strong></li>
        </ul>
        <div class="carts">
            @php $total = 0; @endphp

            <table class="table">
                <tbody>
                    <tr class="table_head">
                        <th class="column-1">Sản phẩm</th>
                        <th class="column-2">Số lượng</th>
                        <th class="column-3">Giá</th>
                        <th class="column-4">Thành Tiền</th>

                    </tr>
                    @foreach ($orders as $order)
                        @php
                            $priceEnd = $order->price * $order->qty;
                            $total += $priceEnd;
                        @endphp
                        <tr class="table_row">
                            <td class="column-1">
                                <div class="how-itemcart1">
                                    <img width="100px" src="{{ $order->thumb }}" alt="IMG">
                                </div>
                            </td>
                            <td class="column-2">{{ $order->qty }}</td>

                            <td class="column-3">
                                ${{ number_format($order->price, 0) }}
                            </td>
                            <td class="column-4">${{ $priceEnd }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td style="font-size: 20px" colspan="2" align="center" class="column-4">
                            @if ($cart->status == 1)
                                <button class="btn btn-succes">Đơn hàng đã được giao</button>
                            @else
                                <strong> Tổng tiền: ${{ number_format($total, 0) }}</strong>
                                <a href="/admin/orders/confirm/{{ $order->cart_id }}" class="btn btn-primary">Xác nhận</a>
                            @endif
                        </td>
                        <td style="font-size: 20px" colspan="2" align="center" class="column-4">

                            <a href="/admin/orders/create-pdf-file/{{ $order->cart_id }}" class="btn btn-info">In đơn hàng</a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
@endsection
