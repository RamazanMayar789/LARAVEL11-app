 <div class="mb-4 row layout-spacing layout-top-spacing">
<form  wire:submit="submit(Object.fromEntries(new FormData($event.target)))" class="row">
 <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">

                            <div class="widget-content widget-content-area ecommerce-create-section">

                                <div class="mb-4 row">
                                    <div class="col-sm-12">
                                        <label for="name">نام محصول</label>
                                        <input type="text" class="form-control" name="name" wire:model.live="name" id="name" placeholder="لطفا نام محصول خود وارد کنید !">
                                    </div>
                                </div>
                                @error('name')
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

                                 <div class="mb-4 row">
                                    <div class="col-sm-12">
                                        <label for="slug">اسلاک</label>
                                        <input type="text" class="form-control" readonly id="slug" name="slug" placeholder="" wire:model="slug">
                                    </div>
                                </div>
@error('slug')
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


                                 <div class="mb-4 row">
                                    <div class="col-sm-12">
                                        <label for="meta_title">عنوان میتا</label>
                                        <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="" wire:model="meta_title">
                                    </div>
                                </div>
@error('meta_title')
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
                                 <div class="mb-4 row">
                                    <div class="col-sm-12">
                                        <label for="meta_description">توضحیات میتا</label>
                                        <input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="" wire:model="meta_description">
                                    </div>
                                </div>

                    @error('meta_description')
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

                            </div>

                             <div class="mt-3 widget-content widget-content-area ecommerce-create-section">




                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="product-images">آپلود تصاویر محصول</label>
                                        <div class="multiple-file-upload">
                                           <input class="form-control" type="file" name="photos" id="photos" wire:model="photos" multiple/>
                                            <div class="d-flex">
                                                @foreach ($photos as $photo )
                                                @if(in_array($photo->getMimeType(), ['image/jpeg', 'image/jpg', 'image/png', 'image/gif','image/webp']))
                                                 <div class="m-3 item w-25">
                                                    <img src="{{ $photo->temporaryUrl() }}" class="w-100" alt=""/>
                                                </div>
                                                @endif
                                                @endforeach
                                                 <div wire:loading wire:target="photos" class="spinner-border spinner-border-sm text-info" role="status"></div>
                                            </div>
                                               @error('photos')
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

                                        </div>
                                    </div>






                                </div>

                            </div>

                        </div>

                        <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12">

                            <div class="row">
                                <div class="mt-4 col-xxl-12 col-xl-8 col-lg-8 col-md-7 mt-xxl-0">
                                    <div class="widget-content widget-content-area ecommerce-create-section">
                                        <div class="row">

                                            <div class="mb-4 col-xxl-12 col-md-6">
                                                <label for="price">قیمت</label>
                                                <input type="number" class="form-control" id="price" value="" name="price" wire:model="price">
                                            </div>
                                             @error('price')
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
                                            <div class="mb-4 col-xxl-12 col-md-6">
                                                <label for="stock">تعداد موجودی </label>
                                                <input type="number" class="form-control" id="stock" name="stock" value="" wire:model="stock">
                                            </div>
                                             @error('stock')
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
                                            <div class="mb-4 col-xxl-12 col-md-6">
                                                <label for="categoryId">دسته بندی</label>
                                                <select class="form-select" id="categoryId" name="categoryId" wire:model="categoryId">
                                                    @foreach ($categories as $category)
                                                     <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach


                                                </select>
                                            </div>
                                             @error('categoryId')
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
                                            <div class="mb-4 col-xxl-12 col-md-6">
                                                <label for="sellerId">فروشنده</label>
                                                <select class="form-select" id="sellerId" name="sellerId" wire:model="sellerId">
                                                    @foreach ($sellers as $seller )
                                                    <option value="{{ $seller->id }}">{{ $seller->shop_name }}</option>
                                                    @endforeach


                                                </select>
                                            </div>
                                             @error('sellerId')
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


                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 col-xxl-12 col-xl-4 col-lg-4 col-md-5">
                                    <div class="widget-content widget-content-area ecommerce-create-section">
                                        <div class="row">
                                            <div class="mb-4 col-sm-12">
                                                <label for="discount">در صد تخفیف</label>
                                                <input type="number" class="form-control" id="discount" name="discount" value="" wire:model="discount">
                                            </div>
                                             @error('discount')
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
                                            <div class="mb-4 col-sm-12">
                                                <label for="discount_duration">تاریخ انقضاء</label>
                                                <input type="date" class="form-control" id="discount_duration" value="" wire:model="discount_duration">
                                            </div>
                                             @error('discount_duration')
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
                                            <div class="mb-4 col-sm-12">
                                                <div class="switch form-switch-custom switch-inline form-switch-danger">
                                                    <input class="switch-input" type="checkbox" role="switch" id="featured" name="featured" wire:model="featured">
                                                    <label class="switch-label" for="featured">کالای ویژه</label>
                                                </div>
                                            </div>
                                             @error('featured')
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
                                            <div class="col-sm-12">
                                                <button class="btn btn-success w-100">ذخیره</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

</form>


                    </div>
