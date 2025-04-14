<div class="col-md-5">

    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>مدیریت استوری ها </h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">

            <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))">

        <div class="mb-3 row g-3">
            <div class="col-md-6">
                <label for="code" class="form-label">کد کوپن</label>
                <input type="text" class="form-control" id="code" name="code" wire:model='code' >

                @error('code')
                    <div class="mb-4 border-0 alert alert-light-danger alert-dismissible fade show" role="alert" wire:loading.remove>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <svg> ...</svg>
                        </button>
                        <strong>خطا !</strong> {{$message}}.</button>
                    </div>
                @enderror
            </div>


            <div class="col-md-6">
                <label for="type" class="form-label">نوع کوپن</label>
                <select class="form-select" id="type" name="type" wire:model='type'>
                    <option value="fixed">مقدار ثابت</option>
                    <option value="percent">درصدی</option>
                </select>
            </div>

            @error('type')
                <div class="mb-4 border-0 alert alert-light-danger alert-dismissible fade show" role="alert" wire:loading.remove>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <svg> ...</svg>
                    </button>
                    <strong>خطا !</strong> {{$message}}.</button>
                </div>
            @enderror
        </div>


        <div class="mb-3 row g-3">
            <div class="col-md-6">
                <label for="value" class="form-label">مقدار تخفیف</label>
                <input type="number" class="form-control" id="value" name="value"  wire:model='value'>

                @error('value')
                    <div class="mb-4 border-0 alert alert-light-danger alert-dismissible fade show" role="alert" wire:loading.remove>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <svg> ...</svg>
                        </button>
                        <strong>خطا !</strong> {{$message}}.</button>
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="limit" class="form-label">تعداد دفعات استفاده</label>
                <input type="number" class="form-control" id="limit" name="limit" wire:model='limit'>

                @error('limit')
                    <div class="mb-4 border-0 alert alert-light-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <svg> ...</svg>
                        </button>
                        <strong>خطا !</strong> {{$message}}.</button>
                    </div>
                    @enderror
            </div>
        </div>

        <div class="mb-3 row g-3">
            <div class="col-md-6">
                <label for="main_purchase" class="form-label">حداقل خرید</label>
                <input type="number" class="form-control" id="main_purchase" name="main_purchase" wire:modal='main_purchase'>

                @error('main_purchase')
                    <div class="mb-4 border-0 alert alert-light-danger alert-dismissible fade show" role="alert" wire:loading.remove>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <svg> ...</svg>
                        </button>
                        <strong>خطا !</strong> {{$message}}.</button>
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="expire_at" class="form-label">تاریخ انقضا</label>
                <input type="datetime-local" class="form-control" id="expire_at" name="expire_at" wire:model='expire_at'>
                @error('expire_at')
                    <div class="mb-4 border-0 alert alert-light-danger alert-dismissible fade show" role="alert" wire:loading.remove>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <svg> ...</svg>
                        </button>
                        <strong>خطا !</strong> {{$message}}.</button>
                    </div>
                    @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <div class="col-md-6 d-flex align-items-center">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" wire:model='is_active'>
                    <label class="form-check-label ms-2" for="is_active">فعال باشد</label>
                </div>

                @error('is_active')
                    <div class="mb-4 border-0 alert alert-light-danger alert-dismissible fade show" role="alert" wire:loading.remove>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <svg> ...</svg>
                        </button>
                        <strong>خطا !</strong> {{$message}}.</button>
                    </div>

                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">ذخیره کوپن</button>
            </form>

        </div>
    </div>
</div>
