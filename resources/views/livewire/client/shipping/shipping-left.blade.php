<div class="shipping-left">
    <div class="final-invoice">
        <form wire:submit="checkCodeDiscount(Object.fromEntries(new FormData($event.target)))" class="mb-3 discount-code">
            <span class="mb-1 d-block">کد تحفیف</span>
            <div class=" d-flex justify-content-between">
                <input type="text" name="code">
                <button>ثبت</button>
            </div>
@error('code')
    <span class="text-danger">{{ $message }}</span>
@enderror

@if (session()->has('success'))
    <span class="text-primary">{{ session('success') }}</span>
@endif

@if (session()->has('error'))
    <span class="validation-error">{{ session('error') }}</span>
@endif

        </form>
        <div class="mb-3 d-flex align-items-center justify-content-between">
            <span>
                قیمت کالاها ({{ number_format($totalProductCount) }})
            </span>
            <span>
                {{ number_format($totaloriginalPrice) }}
                افغانی

            </span>
        </div>

        <div class="mb-3 d-flex align-items-center justify-content-between">
            <span>
                هزینه ارسال
            </span>
            <span>
                {{$deliveryPrice}}
                افغانی

            </span>
        </div>
        <div class="mb-3 d-flex align-items-center justify-content-between">
            <span>
                سود شما از خرید


            </span>
            <span>
                (۵٪)
                {{number_format($totaldiscountAmount) }}

                افغانی

            </span>
        </div>
        <div class="mb-3 d-flex df align-items-center justify-content-between">
            <span>
                قابل پرداخت

            </span>
            <span>
                {{ number_format($AmountTotal) }}
                افغانی

            </span>
        </div>
        <button class="p-2 mt-2 addToBasket-btn w-100 fs-6">
            ثبت سفارش
        </button>
    </div>

</div>
