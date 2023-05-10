<section class="section-slide">
    <div class="wrap-slick1">
        <div class="slick1">
            @foreach ($sliders as $key => $slider)
                <div class="item-slick1" style="background-image: url({{ $slider->thumb }});">
                    <div class="container h-full">
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
