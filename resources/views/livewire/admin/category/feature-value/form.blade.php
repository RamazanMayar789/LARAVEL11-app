<div class="col-md-4">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>
                        مقادیر ویژگی
                    {{ $featureName }}
                    </h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <form  wire:submit="submit(Object.fromEntries(new FormData($event.target)))">
                <div class="mb-4 row">
                    <div class="col-sm-12">
                        <label class="form-label" for="value">نام  مقادیر</label>
                        <input type="text" class="form-control" wire:model="value" id="value" name="value" placeholder="لطفا نام دسته بندی خود را وارد کنید">
                    </div>
                </div>
                @error('value')
                <div wire:loading.remove class="mb-4 border-0 alert alert-light-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-bs-dismiss="alert">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                    <strong>{{ $message }}</strong>
                </div>
                @enderror

                <button type="submit" class="btn btn-primary">
                    <span wire:loading.remove wire:target="submit">ثبت</span>
                    <div class="text-white spinner-border me-2 align-self-center loader-sm" wire:loading wire:target="submit"></div>
                </button>
            </form>
        </div>
    </div>
</div>
