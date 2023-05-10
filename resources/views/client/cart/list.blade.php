@extends('client.main')
@section('content')

    <form method="post" class="bg0 p-t-75 p-b-85">
        <div class="container">
            @include('client.alert')
            @if (count($products) != 0)
                <div class="row">
                    <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                        <div class="m-l-25 m-r--38 m-lr-0-xl">
                            @php $total = 0; @endphp
                            <div class="wrap-table-shopping-cart">
                                <table class="table-shopping-cart">
                                    <tbody>
                                        <tr class="table_head">
                                            <th class="column-1">Sản phẩm</th>
                                            <th class="column-2"></th>
                                            <th class="column-3">Giá</th>
                                            <th class="column-4">Số lượng</th>
                                            <th class="column-5">Tổng</th>
                                        </tr>
                                        @foreach ($products as $product)
                                            @php
                                                $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
                                                $priceEnd = $price * $carts[$product->id];
                                                $total += $priceEnd;
                                            @endphp
                                            <tr class="table_row">
                                                <td class="column-1">
                                                    <div class="how-itemcart1">
                                                        <img src="{{ $product->thumb }}" alt="IMG">
                                                    </div>
                                                </td>
                                                <td class="column-2">{{ $product->name }}</td>
                                                <td class="column-3">
                                                    ${{ number_format($product->price_sale != 0 ? $product->price_sale : $product->price, 0) }}
                                                </td>
                                                <td class="column-4">
                                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                                        </div>

                                                        <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                            name="num-product[{{ $product->id }}]"
                                                            value="{{ $carts[$product->id] }}">
                                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="column-5">${{ $priceEnd }}</td>
                                                <td class="p-r-15">
                                                    <a href="/carts/delete/{{ $product->id }}">Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div style="justify-content: flex-end"
                                class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">

                                <input type="submit" formaction="/update-cart" value="Update Cart"
                                    class="flex-end flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                @csrf
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                        <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">

                            <div class="flex-w flex-t p-t-27 p-b-33">
                                <div class="size-208">
                                    <span class="mtext-101 cl2">
                                        Total:
                                    </span>
                                </div>

                                <div class="size-209 p-t-1">
                                    $
                                    <span id="totalPrice" class="mtext-110 cl2">
                                        {{ $total }}
                                    </span>
                                </div>
                            </div>

                            @if (Auth::user())
                                <button id="buttonOrder" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                    Đặt hàng
                                </button>
                                <hr>
                                <div class="m-t-20">
                                    Hình thức thanh toán
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Tiền mặt
                                        </label>
                                    </div>
                                    <div class="form-check">
                                       
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            <div id="paypal-button">
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            @else
                                <a href="/login"
                                    class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15
                                    trans-04 pointer">
                                    Đăng nhập để đặt hàng
                                </a>
                            @endif

                        </div>
                    </div>
                </div>
            @else
                <div class="breadcrumb_section bg_gray page-title-mini">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="page-title">
                                    <h1>Giỏ hàng</h1>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <ol class="breadcrumb justify-content-md-end">
                                    <li class="breadcrumb-item"><a href="/carts">Trang chủ</a></li>
                                    <li class="breadcrumb-item active">Giỏ hàng</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main_content">
                    <div class="section">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="text-center order_complete">
                                        <div class="heading_s1">
                                            <h3>Giỏ hàng chưa có sản phẩm!</h3>
                                        </div>
                                        <p>Giỏ hàng của bạn đang rỗng, xin hãy lấp đầy nó bằng việc duyệt qua các sản phẩm
                                            của cửa hàng
                                            và bỏ vào giỏ các sản phẩm mà bạn yêu thích và có ý định sẽ sở hữu nó.</p>
                                        <a href="/" class="btn btn-primary">TIẾP TỤC MUA SẮM</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </form>
@endsection
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        const totalPrice = document.querySelector('#totalPrice')
        // console.log(totalPrice.innerText)
        const buttonOrder = document.querySelector('#buttonOrder');
        paypal.Button.render({
        // Configure environment
        env: 'sandbox',
        client: {
            sandbox: 'AZwuDktpCzVcFDn6dng1aCM6fi6JF-jdt6b4YQ9-UmnaRo6S-k5zEBcl2fbmGrfbq6s2Ujbw-BxVapuS',
            production: 'demo_production_client_id'
        },
        // Customize button (optional)
        locale: 'en_US',
        style: {
            size: 'small',
            color: 'gold',
            shape: 'pill',
        },

        // Enable Pay Now checkout flow (optional)
        commit: true,

        // Set up a payment
        payment: function(data, actions) {

            return actions.payment.create({
                transactions: [{
                    amount: {
                        total: totalPrice.innerText,
                        currency: 'USD'
                    }
                }]
            });
        },
        // Execute the payment
        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                buttonOrder.click()
            });
        }
    }, '#paypal-button');
    });


    
</script>
