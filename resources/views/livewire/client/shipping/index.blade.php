<div>
 @push('link')


    <link rel="stylesheet" href="/client/assets-v2/css/shipping.css"/>
@endpush
<section class="shipping">
    <div class="mb-3 shipping-top d-flex align-items-center ">
        <span class="d-flex align-items-center">
            <i class="ml-2 fa-light fa-arrow-right"></i>
            آدرس و زمان ارسال
        </span>
        <div class="logo">
            <img src="/client/assets-v2/images/full-horizontal.svg" alt="problome" />

        </div>
    </div>
    <div class="shipping-content d-flex">
        {{-- shipping right --}}

        @include('livewire.client.shipping.shipping-right')
        {{-- shipping left --}}

        @include('livewire.client.shipping.shipping-left')


    </div>

</section>
<!-- Add address modal box -->

@include('livewire.client.shipping.address-modal')


@push('script')



    <script src="/client/assets-v2/js/jquery.min.js"></script>
    <script src="/client/assets-v2/js/shipping.js"></script>
@endpush

</div>
