<div x-intersect="initializeSwiper">
<section class="px-0 my-4 container-fluid container-lg my-lg-0 p-lg-4 productSlider">
    <div class="overflow-hidden productItems d-flex flex-column flex-lg-row align-items-center bg-danger">
        <!-- Suggestion -->
        <div class="gap-3 d-flex align-items-center justify-content-between gap-lg-0 flex-lg-column Suggestion">
            <div
                class="flex-row-reverse gap-3 my-3 d-flex flex-lg-column align-items-center justify-content-between justify-content-lg-center mt-lg-3 mx-lg-5">
                <img width="80" src="/client/assets/productSlider/Amazings (1).svg" class="d-none d-lg-block"
                    alt="slide-img" />

                <!-- timer -->
                <div id="countdown" class="d-flex fw-bold" dir="ltr">
                    <span id="hours" class="p-1 bg-white fs-9 rounded-2">00</span>
                    <span class="text-white colon">:</span>
                    <span id="minutes" class="p-1 bg-white fs-9 rounded-2">00</span>
                    <span class="text-white colon">:</span>
                    <span id="seconds" class="p-1 bg-white fs-9 rounded-2">00</span>
                </div>

                <p class="text-white d-lg-none fw-bold fs-6">شگفت انگیز</p>

                <img width="80" src="/client/assets/productSlider/Amazing.svg" alt="slide-img" />
            </div>
            <p class="text-center text-white fs-9 d-flex">
                <span class="d-none d-lg-block">مشاهده &nbsp;</span> همه
                <svg width="18" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </p>
        </div>

        <div class="swiper mySwiper w-100" id="product">
            <div class="swiper-wrapper">

                @foreach($featureProduct as $item)
                    <a href="{{ route('client.ProductIndex',$item->p_code) }}/{{ $item->seoItems->slug }}" class="text-black swiper-slide">
                        <div>
                            <img src="/products/{{ $item->id }}/medium/{{ $item->coverImage->path }}" alt="slide-img" />
                            <p class="p-1 fs-8 fw-bold ellipsis">{{ $item->name }}</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-around w-100">
                            <h6>{{ $item->discount }}</h6>
                            <div class="mt-3 price">
                                <p class="fs-8">{{ $item->finalprice }}<span class="fs-9 me-2">افغانی</span></p>
                                <del class="beforeDiscount fs-9 text-end">{{  number_format($item->price)}}</del>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>
</div>
