<div class="mt-4 col-xxl-12 col-xl-4 col-lg-4 col-md-5">
    <div class="widget-content widget-content-area ecommerce-create-section">
        <div class="row">
            <div class="mb-4 col-sm-12">
                <label for="discount">در صد تخفیف</label>
                <input type="number" class="form-control" id="discount" name="discount" value="" wire:model="discount">
            </div>
            @error('discount')
                <div wire:loading.remove class="mb-4 border-0 alert alert-light-danger alert-dismissible fade show"
                    role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-x close" data-bs-dismiss="alert">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
            <div class="mb-4 col-sm-12">
                <label for="discount_duration">تاریخ انقضاء</label>
                <input type="date" class="form-control" id="discount_duration" value="" wire:model="discount_duration">
            </div>
            @error('discount_duration')
                <div wire:loading.remove class="mb-4 border-0 alert alert-light-danger alert-dismissible fade show"
                    role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-x close" data-bs-dismiss="alert">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
            <div class="mb-4 col-sm-12">
                <div class="switch form-switch-custom switch-inline form-switch-danger">
                    <input class="switch-input" type="checkbox" role="switch" id="featured" name="featured"
                        wire:model="featured">
                    <label class="switch-label" for="featured">کالای ویژه</label>
                </div>
            </div>
            @error('featured')
                <div wire:loading.remove class="mb-4 border-0 alert alert-light-danger alert-dismissible fade show"
                    role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-x close" data-bs-dismiss="alert">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">
                    <span wire:loading.remove wire:target="submit">ثبت</span>
                    <div class="text-white spinner-border me-2 align-self-center loader-sm" wire:loading
                        wire:target="submit"></div>
                </button>
            </div>
        </div>
    </div>
</div>
