<div class="shipping-right">
    <div class="mb-3 shipping-address">
        <div class="pl-1 pr-2 mb-3 d-flex align-items-center justify-content-between">
            <span class="fs-5 fw-bold">
                آدرس های شما :
            </span>
            <div class="add-new-address d-flex justify-content-end">
                <button class="d-flex align-items-center openModalBtn " wire:click="getprovince('add')">
                    <i class="ml-2 fa fa-plus"></i>
                    افزودن آدرس جدید

                </button>
            </div>
        </div>
        @foreach ($AddressList as $item)
            <div class="shipping-address__item d-flex align-items-center {{ $loop->first ? 'active' : '' }}" wire:ignore.self>
                <i class="ml-3 fa-light fa-location-dot fs-4"></i>
                <div class="shipping-address__details">
                    <span class="d-block">
                        ارسال به آدرس انتخاب شده
                    </span>
                    <span>
                     {{$item->address}}
                    </span>
                    <button class="address-edit__btn d-flex align-items-center openModalBtn" wire:click='editAddress({{ $item->id }})'>
                        ویرایش آدرس
                        <i class="mr-2 fa fa-chevron-left"></i>
                    </button>
                </div>
            </div>

        @endforeach

    </div>

    <div class="shipping-type " wire:ignore>
        <span class="mb-3 fs-5 fw-bold d-block">
            نحوه ارسال :
        </span>
        @foreach ($deliveries as $item)
            <div class="shipping-type__item d-flex align-items-center {{ $loop->first ? 'active' : ''}}"
                 wire:click="changeDelivery({{ $item->id }})">
                <i class="ml-3 fa fa-truck"></i>
                <div class="">
                {{ $item->name }}
                    <span class="shipping-type__price">
                    {{ $item->price }}
                       افغانی
                    </span>
                </div>

            </div>
        @endforeach


    </div>
</div>
