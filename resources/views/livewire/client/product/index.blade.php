<div>

    @push('style')

        <link rel="stylesheet" href="/client/css/product.css" />


    @endpush
    <div class="px-3 py-4 bg-white fixed-bottom d-lg-none border-top bg-danger">
        <!-- text slider -->
        <div class="slider">
            <p class="active text-danger fs-9 fw-medium">❤️ ۵۰۰+ نفر به این کالا علاقه دارند</p>
            <p class="text-success fs-9 f w-medium">🤩 بهترین قیمت در ۳۰ روز گذشته</p>
            <p class="text-success fs-9 fw-medium">🧺 در سبد خرید ۱۰۰۰+ نفر</p>
        </div>
        <div class="d-flex align-items-center justify-content-between">
            <button class="py-2 btn btn-danger fs-9">افزودن به سبر خرید</button>
            <div class="d-flex align-items-center justify-content-end">
                <button type="button" class="bg-transparent border-0" data-bs-toggle="tooltip" data-bs-placement="left"
                    title="این کالا توسط فروشنده آن قیمت گذاری شده">
                    <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="size-6 text-secondary">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                </button>
                <p class="fs-9">20,430,000</p>
                <p class="fs-9 fw-light me-1">تومان</p>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    <div class="gap-2 breadcrumb fs-8 text-secondary d-flex align-items-center">
        <a href="#" class="text-secondary">دیجی کالا</a>
        <p>/</p>
        <a href="#" class="text-secondary">کالای دیجیتال</a>
        <p>/</p>
        <a href="#" class="text-secondary">ساعت هوشمند</a>
    </div>

    <!-- ====== Product Detail ====== -->
    <section class="my-lg-5 row mx-lg-5">
        <!-- === Picture === -->
        <livewire:client.product.gallery :images="$product->images" :productId="$product->id" :coverImage="$product->coverImage"/>
        <!-- === Title & Details === -->
       <livewire:client.product.details :name="$product->name"/>
        <!-- === Seller Detail === -->
     <livewire:client.product.by-box  :sellerName="$product->seller->name" :price="$product->price" :productId="$product->id" :discount="$product->discount" :finalprice="$product->finalprice"/>
    </section>

    <!-- ====== Product Options ====== -->
    <section class="container mx-auto my-lg-5 d-flex align-items-center justify-content-center gap-md-5 options">
        <a href="#" class="flex-wrap gap-2 text-secondary d-flex align-items-center justify-content-center">
            <img src="/client/assets/Product/express-delivery.svg" alt="express-delivery" />
            <p class="fs-8">امکان تحویل اکسپرس</p>
        </a>
        <a href="#" class="flex-wrap gap-2 text-secondary d-flex align-items-center justify-content-center">
            <img src="/client/assets/Product/support.svg" alt="express-delivery" />
            <p class="fs-8">24 ساعته، 7 روز هفته</p>
        </a>
        <a href="#" class="flex-wrap gap-2 text-secondary d-flex align-items-center justify-content-center">
            <img src="/client/assets/Product/cash-on-delivery.svg" alt="express-delivery" />
            <p class="fs-8">امکان پرداخت در محل</p>
        </a>
        <a href="#" class="flex-wrap gap-2 text-secondary d-flex align-items-center justify-content-center">
            <img src="/client/assets/Product/days-return.svg" alt="express-delivery" />
            <p class="fs-8">هفت روز ضمانت بازگشت کالا</p>
        </a>
        <a href="#" class="flex-wrap gap-2 text-secondary d-flex align-items-center justify-content-center">
            <img src="/client/assets/Product/original-products.svg" alt="express-delivery" />
            <p class="fs-8">ضمانت اصل بودن کالا</p>
        </a>
    </section>

    <!-- ====== Seller ====== -->
   <livewire:client.product.seller />
    <!-- ====== Banner ====== -->
    <section class="my-5 container-lg container-fluid">
        <img src="/client/assets/Product/banner.jpg" alt="banner" class="w-100 rounded-3" />
    </section>

    <!-- ====== Product more Details ====== -->

<livewire:client.product.tabs  :productId="$product->id"  :name="$product->name" :sellerName="$product->seller->name"/>
    <!-- ====== Bought next to it ====== -->

<livewire:client.product.beside>
    @push('script')

        <script src="/client/js/product.js"></script>


    @endpush
</div>
