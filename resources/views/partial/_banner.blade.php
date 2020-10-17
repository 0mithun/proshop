<!-- Banner -->

    <div class="banner">
        <div class="banner_background" style="background-image:url({{ asset('frontend')  }}/images/banner_background.jpg)"></div>
        <div class="container fill_height">
            <div class="row fill_height">
                <div class="banner_product_image"><img src="{{ asset($mainSliderProduct->image_one)  }}" alt="{{ $mainSliderProduct->name  }}"></div>
                <div class="col-lg-5 offset-lg-4 fill_height">
                    <div class="banner_content">
                        <h1 class="banner_text">{{ $mainSliderProduct->name  }}</h1>
                        <div class="banner_price">
                            @if($mainSliderProduct->discount_price === null)
                                <span>${{ $mainSliderProduct->sell_price  }}</span>
                            @else
                                <span>${{ $mainSliderProduct->sell_price  }}</span>${{ $mainSliderProduct->discount_price  }}
                            @endif
                        </div>
                        <div class="banner_product_name">{{ $mainSliderProduct->brand->name  }}</div>
                        <div class="button banner_button"><a href="#">Shop Now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


