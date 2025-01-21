<div class="mt-4 col-xxl-12 col-xl-8 col-lg-8 col-md-7 mt-xxl-0">
    <div class="widget-content widget-content-area ecommerce-create-section">
        <div class="row">

            <div class="mb-4 col-xxl-12 col-md-6">
                <label for="price">قیمت</label>
                <input type="number" class="form-control" id="price" value="" name="price" wire:model="price">
            </div>
            @error('price')
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
            <div class="mb-4 col-xxl-12 col-md-6">
                <label for="stock">تعداد موجودی </label>
                <input type="number" class="form-control" id="stock" name="stock" value="" wire:model="stock">
            </div>
            @error('stock')
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
            <div class="mb-4 col-xxl-12 col-md-6">
                <label for="categoryId">دسته بندی</label>
                <select class="form-select" id="categoryId" name="categoryId" wire:model="categoryId">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach


                </select>
            </div>
            @error('categoryId')
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
            <div class="mb-4 col-xxl-12 col-md-6">
                <label for="sellerId">فروشنده</label>
                <select class="form-select" id="sellerId" name="sellerId" wire:model="sellerId">
                    @foreach ($sellers as $seller)
                        <option value="{{ $seller->id }}">{{ $seller->shop_name }}</option>
                    @endforeach


                </select>
            </div>
            @error('sellerId')
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


        </div>
    </div>
</div>
