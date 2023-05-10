@extends('client.main')
@section('content')
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a href="/bai-viet" class="stext-109 cl8 hov-cl1 trans-04">
                Blog
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                {{ $blog->name }}
            </span>
        </div>
    </div>
    <section class="bg0 p-t-52 p-b-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 p-b-80">
                    <div class="p-r-45 p-r-0-lg">
                        <!--  -->
                        <div class="wrap-pic-w how-pos5-parent">
                            <img src="{{ $blog->thumb }}" alt="IMG-BLOG">

                            <div class="flex-col-c-m size-123 bg9 how-pos5">
                                <span class="ltext-107 cl2 txt-center">
                                    22
                                </span>

                                <span class="stext-109 cl3 txt-center">
                                    Dec 2022
                                </span>
                            </div>
                        </div>

                        <div class="p-t-32">


                            <h4 class="ltext-109 cl2 p-b-28">
                                {{ $blog->name }}
                            </h4>

                            <p class="stext-117 cl6 p-b-26">
                                {{ $blog->description }}
                            </p>

                            <p class="stext-117 cl6 p-b-26">
                                {!! $blog->content !!}
                            </p>
                        </div>


                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
