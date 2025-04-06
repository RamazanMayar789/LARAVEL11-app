<div class="cart-left">
    <div class="cart-invoice">
        <div class="mb-3 d-flex justify-content-between">
            <span>قیمت کالاها ({{ $invoice['totalProductCount'] }}) </span>
            <span>{{ number_format($invoice['totaloriginalPrice']) }} افغانی </span>
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <span>جمع سبد خرید </span>
            <span>{{ number_format($invoice['totaldiscountPrice']) }} افغانی </span>
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <span>سود شما از خرید </span>
            <span>(۱٪) {{ number_format($invoice['totaldiscountAmount']) }} افغانی </span>
        </div>

        <button class="addToBasket-btn w-100 d-md-none d-sm-none">
            تایید و تکمیل سفارش
        </button>

        <div class="complete-order-mobile d-lg-none">
            <button class="addToBasket-btn w-50 ">
                تایید و تکمیل سفارش
            </button>
            <div>
                <span class="d-block">جمع سبد خرید</span>
                <span>{{ number_format($invoice['totaldiscountPrice']) }} افغانی </span>
            </div>
        </div>
    </div>
</div>
