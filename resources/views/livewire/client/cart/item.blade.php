<div class="cart-right">


    @foreach ($cartItems as $item)
        <div class="cart-item">
            <!-- cart product -->
            <div class="cart-item__product d-flex">
                <div class="cart-item__img">
                    <img src="/products/{{ $item->product->id }}/large/{{ $item->product->coverImage->path }}" alt="" />
                </div>
                <div class="cart-item__details">
                    <h3 class="cart-item__title">
                      {{$item->product->name}}
                    </h3>
                    <ul class="cart-item__info">
                        <li class="cart-item__info-item d-flex align-items-start">
                            <span style="background: #000"></span>
                            مشکی
                        </li>
                        <li class="cart-item__info-item d-flex align-items-start">
                            <i class="ml-2 fs-6 fa fa-shield-check"></i>
                            گارانتی
                        </li>
                        <li class="cart-item__info-item d-flex align-items-start">
                            <i class="ml-2 fs-6 fa fa-truck"></i>
                            ارسال با دیجی کالا
                        </li>
                        <li class="cart-item__info-item d-flex align-items-start">
                            <i class="ml-2 fs-6 fa fa-store"></i>
                          فروشنده :{{ $item->product->seller->name }}
                        </li>
                    </ul>
                </div>
            </div>
            <!-- cart-counter & price -->
            <div class="mt-3 cart-item__footer d-flex align-items-center">
                <!-- counter -->
                <div class="cart-counter">
                    <button class="cart-counter__add">
                        <i class="fa fa-plus"></i>
                    </button>

                    <span class="cart-counter__number">1</span>
                    <button class="cart-counter__remove">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
                <!-- product price -->
                <div class="cart-item__footer-price">
                    <span class="cart-item__footer-discounted-price">
                        تخفیف افغانی {{ number_format(($item->product->price*$item->product->discount)/100) }}
                    </span>
                    <span class="cart-item__footer-new-price">{{ number_format($item->product->price) }}</span>
                    افغانی
                </div>
            </div>
        </div>

    @endforeach

</div>
