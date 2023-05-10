<section class="sec-blog bg0 p-t-60 p-b-90">
    <div class="container">
        <div class="p-b-66">
            <h3 class="ltext-105 cl5 txt-center respon1">
                Tin Tức
            </h3>
        </div>

        <div class="row">
            @foreach ($blogs as $key => $blog)
                <div class="col-sm-6 col-md-4 p-b-40">
                    <div class="blog-item">
                        <div class="hov-img0">
                            <a href="/bai-viet/{{ $blog->id }}-{{ $blog->slug }}.html">
                                <img src="{{ $blog->thumb }}" alt="IMG-BLOG">
                            </a>
                        </div>

                        <div class="p-t-15">

                            <h4 class="p-b-12">
                                <a href="/bai-viet/{{ $blog->id }}-{{ $blog->slug }}.html"
                                    class="mtext-101 cl2 hov-cl1 trans-04">
                                    {{ $blog->name }}
                                </a>
                            </h4>

                            <p class="stext-108 cl6">
                                {{ $blog->description }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
