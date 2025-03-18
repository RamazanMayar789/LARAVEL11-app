<div id="detail-content" class="content-div mx-lg-5 {{ $activeTab == 3 ? 'active' : '' }}" wire:ignore.self>
    <div class="mb-3 d-flex flex-column">
        <h5>مشخصات</h5>
        <div class="border-title"></div>
    </div>
    <div class="content-section">
        <div class="gap-5 d-flex justify-content-between justify-content-lg-start me-5">


            <div class="content-section w-100">
                <div class="flex-wrap gap-3 d-flex flex-column align-items-center justify-content-start">
                    @foreach ($productFeatures as $item)
                        <div class="flex-row gap-4 d-flex fs-8 text-secondary w-100">
                            <p class="w-25">{{ $item->categoryFeature->name }}</p>
                            <p class="text-secondary w-25">{{ $item->categoryFeatureValue->value }}</p>

                        </div>
                    @endforeach


                </div>
                <div class="more-content"></div>
            </div>
        </div>
        <div class="more-content">
            <hr />
            <div class="gap-5 d-flex justify-content-between justify-content-lg-start me-5">
                <p class="fw-semibold">پردازنده</p>

                <div class="content-section">
                    <div class="flex-wrap gap-5 d-flex align-items-center">
                        <div class="gap-4 d-flex flex-column fs-8 text-secondary">
                            <p>توضیحات سیم کارت</p>
                            <p>تعداد سیم کارت</p>
                            <p>دسته ‌بندی</p>
                        </div>
                        <div class="gap-4 d-flex flex-column fs-8">
                            <p>توضیحات سیم کارت</p>
                            <p>تعداد سیم کارت</p>
                            <p>دسته ‌بندی</p>
                        </div>
                    </div>
                    <div class="more-content"></div>
                </div>
            </div>
            <div class="gap-5 d-flex justify-content-between justify-content-lg-start me-5">
                <p class="fw-semibold">حافظه</p>

                <div class="content-section">
                    <div class="flex-wrap gap-5 d-flex align-items-center">
                        <div class="gap-4 d-flex flex-column fs-8 text-secondary">
                            <p>توضیحات سیم کارت</p>
                            <p>تعداد سیم کارت</p>
                            <p>دسته ‌بندی</p>
                        </div>
                        <div class="gap-4 d-flex flex-column fs-8">
                            <p>توضیحات سیم کارت</p>
                            <p>تعداد سیم کارت</p>
                            <p>دسته ‌بندی</p>
                        </div>
                    </div>
                    <div class="more-content"></div>
                </div>
            </div>
        </div>
        <button class="mt-2 toggle-btn fs-8 text-info">
            بیشتر
            <svg width="15" height="15" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
        </button>
    </div>
</div>
