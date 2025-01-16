 <div class="mb-4 row layout-spacing layout-top-spacing">

                        <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">

                            <div class="widget-content widget-content-area ecommerce-create-section">

                                <div class="mb-4 row">
                                    <div class="col-sm-12">
                                        <label for="name">نام محصول</label>
                                        <input type="text" class="form-control" wire:model.live="name" id="name" placeholder="لطفا نام محصول خود وارد کنید !">
                                    </div>
                                </div>

                                 <div class="mb-4 row">
                                    <div class="col-sm-12">
                                        <label for="slug">اسلاک</label>
                                        <input type="text" class="form-control" readonly id="slug" placeholder="" wire:model="slug">
                                    </div>
                                </div>



                                 <div class="mb-4 row">
                                    <div class="col-sm-12">
                                        <label for="meta_title">عنوان میتا</label>
                                        <input type="text" class="form-control" id="meta_title" placeholder="">
                                    </div>
                                </div>

                                 <div class="mb-4 row">
                                    <div class="col-sm-12">
                                        <label for="meta_description">توشحیات میتا</label>
                                        <input type="text" class="form-control" id="meta_description" placeholder="">
                                    </div>
                                </div>


                               
                            </div>

                             <div class="mt-3 widget-content widget-content-area ecommerce-create-section">




                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="product-images">Upload Images</label>
                                        <div class="multiple-file-upload">
                                            <input type="file"
                                                class="filepond file-upload-multiple"
                                                name="filepond"
                                                id="product-images"
                                                multiple
                                                data-allow-reorder="true"
                                                data-max-file-size="3MB"
                                                data-max-files="5">
                                        </div>
                                    </div>

                                    <div class="text-center col-md-4">
                                        <div class="mt-4 switch form-switch-custom switch-inline form-switch-primary">
                                            <input class="switch-input" type="checkbox" role="switch" id="showPublicly" checked>
                                            <label class="switch-label" for="showPublicly">Display publicly</label>
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
                                                <input type="number" class="form-control" id="price" value="" name="price">
                                            </div>
                                            <div class="mb-4 col-xxl-12 col-md-6">
                                                <label for="stock">تعداد موجودی </label>
                                                <input type="number" class="form-control" id="stock" name="stock" value="">
                                            </div>
                                            <div class="mb-4 col-xxl-12 col-md-6">
                                                <label for="categoryId">دسته بندی</label>
                                                <select class="form-select" id="categoryId" name="categoryId">
                                                    @foreach ($categories as $category)
                                                     <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach


                                                </select>
                                            </div>
                                            <div class="mb-4 col-xxl-12 col-md-6">
                                                <label for="sellerId">فروشنده</label>
                                                <select class="form-select" id="sellerId" name="sellerId">
                                                    @foreach ($sellers as $seller )
                                                    <option value="{{ $seller->id }}">{{ $seller->shop_name }}</option>
                                                    @endforeach


                                                </select>
                                            </div>
                                            <div class="col-xxl-12 col-lg-6 col-md-12">
                                                <label for="tags">Tags</label>
                                                <input id="tags" class="product-tags" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 col-xxl-12 col-xl-4 col-lg-4 col-md-5">
                                    <div class="widget-content widget-content-area ecommerce-create-section">
                                        <div class="row">
                                            <div class="mb-4 col-sm-12">
                                                <label for="discount">در صد تخفیف</label>
                                                <input type="number" class="form-control" id="discount" name="discount" value="">
                                            </div>
                                            <div class="mb-4 col-sm-12">
                                                <label for="discount_duration">تاریخ انقضاء</label>
                                                <input type="date" class="form-control" id="discount_duration" value="">
                                            </div>
                                            <div class="mb-4 col-sm-12">
                                                <div class="switch form-switch-custom switch-inline form-switch-danger">
                                                    <input class="switch-input" type="checkbox" role="switch" id="featured" name="featured">
                                                    <label class="switch-label" for="featured">کالای ویژه</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <button class="btn btn-success w-100">ذخیره</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
