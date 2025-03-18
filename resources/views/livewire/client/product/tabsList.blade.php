<ul wire:ignore class="px-0 swiper myProductFeatureSwiper nav nav-tabs px-lg-auto" id="nav">
    <div class="swiper-wrapper">
        <li wire:click='changeTab(1)' class="border-0 swiper-slide nav-item fs-8 active" data-target="#intro-content">
            <a class="nav-link d-flex flex-column" href="#">معرفی</a>
            <span class="indicator"></span>
        </li>
        <li wire:click='changeTab(2)' class="border-0 swiper-slide nav-item fs-8 d-flex flex-column"
            data-target="#review-content">
            <a class=" nav-link d-flex flex-column" href="#">بررسی تخصصی</a>
            <span class="indicator"></span>


        </li>


        <li wire:click='changeTab(3)' class="border-0 swiper-slide nav-item fs-8 d-flex flex-column"
            data-target="#detail-content">
            <a class="nav-link d-flex flex-column" href="#">مشخصات</a>
            <span class="indicator"></span>
        </li>
        <li wire:click='changeTab(4)' class="border-0 swiper-slide nav-item fs-8 d-flex flex-column"
            data-target="#comment-content">
            <a class="nav-link d-flex flex-column" href="#">دیدگاه‌ها</a>
            <span class="indicator"></span>
        </li>
        <li wire:click='changeTab(5)' class="border-0 swiper-slide nav-item fs-8 d-flex flex-column"
            data-target="#question-content">
            <a class="nav-link d-flex flex-column" href="#">پرسش‌ها</a>
            <span class="indicator"></span>
        </li>
    </div>
</ul>
