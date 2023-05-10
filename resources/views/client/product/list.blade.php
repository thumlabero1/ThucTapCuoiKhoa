<div class="row isotope-grid">
    @foreach ($products as $key => $product)
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
            <!-- Block2 -->
            <div class="block2">
                <div class="block2-pic hov-img0">
                    <img src="{{ $product->thumb }}" alt="IMG-PRODUCT">

                    <a href="#"
                        class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                        Quick View
                    </a>
                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name, '-') }}.html">
                            {{ $product->name }}
                        </a>

                        <span class="stext-105 cl3">
                            ${{ number_format($product->price, 0) }}
                        </span>
                    </div>

                    <div class="block2-txt-child2 flex-r p-t-3">
                        <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                            <img class="icon-heart1 dis-block trans-04"
                                src="/template/client/images/icons/icon-heart-01.png" alt="ICON">
                            <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                src="/template/client/images/icons/icon-heart-02.png" alt="ICON">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>
