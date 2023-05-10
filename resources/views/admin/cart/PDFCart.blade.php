<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 8 Generate PDF From View</title>
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
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
                            <!-- <td class="column-1">
                                <div class="how-itemcart1">
                                    <img width="100px" src="{{ $order->thumb }}" alt="IMG">
                                </div>
                            </td> -->
                            <td class="column-2">{{ $order->qty }}</td>

                            <td class="column-3">
                                ${{ number_format($order->price, 0) }}
                            </td>
                            <td class="column-4">${{ $priceEnd }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</body>

</html>
