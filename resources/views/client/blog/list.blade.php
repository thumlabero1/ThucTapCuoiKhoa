@extends('client.main')
@section('content')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/template/client/images/bg-02.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Blog
        </h2>
    </section>
    <section class="bg0 p-t-62 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 p-b-80">
                    <div class="p-r-45 p-r-0-lg">
                        <!-- item blog -->
                        @foreach ($blogs as $key => $blog)
                            <div class="p-b-63">
                                <a href="/bai-viet/{{ $blog->id }}-{{ $blog->slug }}.html"
                                    class="hov-img0 how-pos5-parent">
                                    <img src="{{ $blog->thumb }}" alt="IMG-BLOG">

                                    <div class="flex-col-c-m size-123 bg9 how-pos5">
                                        <span class="ltext-107 cl2 txt-center">
                                            25
                                        </span>

                                        <span class="stext-109 cl3 txt-center">
                                            Jan 2022
                                        </span>
                                    </div>
                                </a>

                                <div class="p-t-32">
                                    <h4 class="p-b-15">
                                        <a href="/bai-viet/{{ $blog->id }}-{{ $blog->slug }}.html"
                                            class="ltext-108 cl2 hov-cl1 trans-04">
                                            {{ $blog->name }}
                                        </a>
                                    </h4>

                                    <p class="stext-117 cl6">
                                        {{ $blog->description }}
                                    </p>
                                </div>
                            </div>
                        @endforeach

                        <!-- Pagination -->
                        <div style="display: flex; justify-content: center">
                            {!! $blogs->links('vendor.pagination.bootstrap-4') !!}
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
<style>

</style>
