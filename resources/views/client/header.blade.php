@php
if (is_null(Session::get('carts'))) {
    $productQuantity = 0;
} else {
    $productQuantity = count(Session::get('carts'));
}
@endphp
<header class="header-v2">
    <!-- Header desktop -->
    @php
        $menusHtml = \App\Helpers\Helper::menus($menus);
        $menusHtmlMobile = \App\Helpers\Helper::menusmobile($menus);
    @endphp
    <div class="container-menu-desktop trans-03">
        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop p-l-45">

                <!-- Logo desktop -->
                <a href="/" class="logo">
                    <img src="/template/client/images/logo.png" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        {!! $menusHtml !!}
                        <!-- <li>
                            <a href="/bai-viet.html">Bài viêt</a>
                        </li> -->
                        <!-- <li>
                            <a href="/ve-chung-toi.html">Về chúng tôi</a>
                        </li> -->
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m p-r-22">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <a href="/carts" class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti"
                        data-notify="{{ $productQuantity }}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </a>
                    <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 "
                        data-notify="0">
                        <i class="zmdi zmdi-favorite-outline"></i>
                    </a>
                    @if (Auth::user())
                        <div class="dropdown">
                            <a href="/login"
                                class="dropdown-toggle dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11"
                                type="button" data-toggle="dropdown">

                                <i class="fa fa-user-o" aria-hidden="true"></i>
                                <span style="font-size: 14px">{{ Auth::user()->name }}</span>
                            </a>
                            <span class="caret"></span>
                            <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Đổi thông tin</a>
                                <a class="dropdown-item" href="/carts">Đơn hàng</a>
                                <a class="dropdown-item" href="/logout">Đăng xuất</a>
                            </div>
                        </div>
                    @else
                        <a href="/login" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                            <i class="fa fa-user-o" aria-hidden="true"></i>
                        </a>
                    @endif
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="/"><img src="/template/client/images/logo.png" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m p-r-22">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <a href="/carts" class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti"
                data-notify="{{ $productQuantity }}">
                <i class="zmdi zmdi-shopping-cart"></i>
            </a>

            <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" data-notify="0">
                <i class="zmdi zmdi-favorite-outline"></i>
            </a>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m">
            {{-- <li>
                <a href="index.html">Home</a>
                <ul class="sub-menu-m">
                    <li><a href="index.html">Homepage 1</a></li>
                    <li><a href="home-02.html">Homepage 2</a></li>
                    <li><a href="home-03.html">Homepage 3</a></li>
                </ul>
                <span class="arrow-main-menu-m">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </li> --}}
            {!! $menusHtml !!}
            <li>
                <a href="/bai-viet.html">Bài viết</a>
            </li>

            <li>
                <a href="/ve-chung-toi.html">Về chúng tôi</a>
            </li>
            @if (Auth::user())
                <li class="dropdown">
                    <a href="/login">

                        <i class="fa fa-user-o" aria-hidden="true"></i>
                        <span style="font-size: 14px">{{ Auth::user()->name }}</span>
                    </a>

                    <ul class="sub-menu-m">
                        <li><a href="#">Đơn hàng</a></li>
                        <li><a href="#">Cập nhật thông tin</a></li>
                        <li><a href="/logout">Đăng xuất</a></li>
                    </ul>
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>
            @else
                <a href="/login" class="dis-block icon-header-item cl2 trans-04 p-l-22 p-r-11">
                    <i class="fa fa-user-o" aria-hidden="true"></i>
                </a>
            @endif

        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="/template/client/images/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form method="get" action="/san-pham.html" class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="search" name="q" placeholder="Search...">
            </form>
        </div>
    </div>
</header>
