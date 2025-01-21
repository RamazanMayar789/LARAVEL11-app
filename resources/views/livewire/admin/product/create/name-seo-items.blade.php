<div class="widget-content widget-content-area ecommerce-create-section">

    <div class="mb-4 row">
        <div class="col-sm-12">
            <label for="name">نام محصول</label>
            <input type="text" class="form-control" name="name" wire:model.live="name" id="name"
                placeholder="لطفا نام محصول خود وارد کنید !">
        </div>
    </div>
    @error('name')
        <div wire:loading.remove class="mb-4 border-0 alert alert-light-danger alert-dismissible fade show" role="alert">
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

    <div class="mb-4 row">
        <div class="col-sm-12">
            <label for="slug">اسلاک</label>
            <input type="text" class="form-control" readonly id="slug" name="slug" placeholder="" wire:model="slug">
        </div>
    </div>
    @error('slug')
        <div wire:loading.remove class="mb-4 border-0 alert alert-light-danger alert-dismissible fade show" role="alert">
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


    <div class="mb-4 row">
        <div class="col-sm-12">
            <label for="meta_title">عنوان میتا</label>
            <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder=""
                wire:model="meta_title">
        </div>
    </div>
    @error('meta_title')
        <div wire:loading.remove class="mb-4 border-0 alert alert-light-danger alert-dismissible fade show" role="alert">
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
    <div class="mb-4 row">
        <div class="col-sm-12">
            <label for="meta_description">توضحیات میتا</label>
            <input type="text" class="form-control" id="meta_description" name="meta_description" placeholder=""
                wire:model="meta_description">
        </div>
    </div>

    @error('meta_description')
        <div wire:loading.remove class="mb-4 border-0 alert alert-light-danger alert-dismissible fade show" role="alert">
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

</div>
