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
                    <button {{ $outOfstock ? 'disable' : '' }} class="cart-counter__add {{ $outOfstock ? 'disabled-btn' : '' }}"  wire:click="updateCartQuantity({{ $item->id }},'increment')">
                        <i class="fa fa-plus"></i>
                    </button>

                    <span class="cart-counter__number">{{ $item->quantity }}</span>

                    @if ($item->quantity == 1)
                        <button class="cart-counter__remove" wire:click="updateCartQuantity({{ $item->id }},'decrement')">
                            <i class="fa fa-trash"></i>
                        </button>
                        @else

                            <button class="cart-counter__remove" wire:click="updateCartQuantity({{ $item->id }},'decrement')">
                                <i class="fa fa-dash"></i>
                            </button>
                        @endif

                </div>
                <!-- product price -->
                <div class="cart-item__footer-price">
                    <span class="cart-item__footer-discounted-price">
                        تخفیف افغانی {{ number_format($item->discountAmount) }}
                    </span>
                    <span class="cart-item__footer-new-price">{{ number_format($item->discountedPrice) }}</span>
                    افغانی
                </div>
            </div>
        </div>

    @endforeach

</div>
