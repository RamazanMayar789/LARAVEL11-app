<div>

<section id="details">
        <ul wire:ignore class="px-0 swiper myProductFeatureSwiper nav nav-tabs px-lg-auto" id="nav">
            <div class="swiper-wrapper">
                <li wire:click='changeTab(1)' class="border-0 swiper-slide nav-item fs-8 active" data-target="#intro-content">
                    <a class="nav-link d-flex flex-column" href="#">معرفی</a>
                    <span class="indicator"></span>
                </li>
                <li wire:click='changeTab(2)' class="border-0 swiper-slide nav-item fs-8 d-flex flex-column" data-target="#review-content">
                    <a class=" nav-link d-flex flex-column"  href="#">بررسی تخصصی</a>
                    <span class="indicator"></span>


                </li>


                <li wire:click='changeTab(3)' class="border-0 swiper-slide nav-item fs-8 d-flex flex-column" data-target="#detail-content">
                    <a class="nav-link d-flex flex-column" href="#">مشخصات</a>
                    <span class="indicator"></span>
                </li>
                <li   wire:click='changeTab(4)' class="border-0 swiper-slide nav-item fs-8 d-flex flex-column" data-target="#comment-content">
                    <a class="nav-link d-flex flex-column" href="#">دیدگاه‌ها</a>
                    <span class="indicator"></span>
                </li>
                <li wire:click='changeTab(5)' class="border-0 swiper-slide nav-item fs-8 d-flex flex-column" data-target="#question-content">
                    <a class="nav-link d-flex flex-column" href="#">پرسش‌ها</a>
                    <span class="indicator"></span>
                </li>
            </div>
        </ul>
        <div id="content" class="mt-4" >
            <!-- introduction -->
            <div id="intro-content" class="content-div mx-lg-5 {{ $activeTab == 1 ? 'active' : '' }}"  wire:ignore>
                <div class="mb-3 d-flex flex-column">
                    <h5>معرفی</h5>
                    <div class="border-title"></div>
                </div>
                <div class="content-section">
                    <p class="fs-8">
                        {{ $shortDescription }}
                    </p>
                    <div class="more-content">

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
            <!-- reviews -->
            <div id="review-content" class="content-div mx-lg-5 {{ $activeTab == 2 ? 'active' : '' }}"  wire:ignore.self>
                <div class="mb-3 d-flex flex-column">
                    <h5>بررسی تخصصی</h5>
                    <div class="border-title"></div>
                </div>
                <div class="content-section">

                    {!! $longDescription !!}
                    <button class="mt-2 toggle-btn fs-8 text-info">
                        بیشتر
                        <svg width="15" height="15" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                    </button>
                </div>
            </div>

            {{-- question --}}

            <div id="question-content" class="content-div mx-lg-5 {{ $activeTab == 5 ? 'active' : '' }}" wire:ignore.self>
                <div class="mb-3 d-flex flex-column">
                    <h5>پرسش‌ها</h5>
                    <div class="border-title"></div>
                </div>
                <div class="content-section row">
                    <div class="top-0 d-none d-lg-block col-lg-3 position-sticky start-0">
                        <p class="mt-3 text-secondary fs-9">شما هم درباره این کالا پرسش ثبت کنید</p>

                        <button class="my-3 btn btn-outline-danger w-75 fs-8" data-bs-toggle="modal"
                            data-bs-target="#questionModal">
                            ثبت پرسش
                        </button>
                    </div>
                    <div class="d-none d-lg-block col-lg-9">
                        <!-- sorting header -->
                        <div class="d-none d-lg-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-start">
                                <div class="gap-1 d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-sort-down" viewBox="0 0 16 16">
                                        <path
                                            d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z" />
                                    </svg>
                                    <p class="fs-8 fw-bold">مرتب سازی:</p>
                                </div>
                                <ul id="colorList" class="gap-3 d-flex align-items-center fs-8">
                                    <li class="text-danger">جدیدترین</li>
                                    <li>بیشتری پاسخ</li>
                                </ul>
                            </div>
                            <div>
                                <p class="fs-9 text-secondary">100 پرسش</p>
                            </div>
                        </div>
                        <!-- question has answer-->

@foreach ($ProductQAs as $row)

    <div>



            <!-- question text -->
            <div class="gap-4 mt-4 d-flex align-items-center">
                <p>{{ $row->title }}</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-question-square text-info" viewBox="0 0 16 16">
                    <path
                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                    <path
                        d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286m1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94" />
                </svg>

            </div>

                            <!-- answer -->
                            @foreach ($productAnswer as $answer)
                                     <div class="mt-4">
                                    <div class="gap-3 d-flex align-items-start">
                                        <p class="fs-9 fw-medium">پاسخ</p>
                                        <div>
                                            <p class="fs-8">{{ $answer->body }}</p>
                                            <div class="gap-2 mt-3 d-flex align-items-center">
                                                <p class="fs-9 text-secondary">{{ $row->user->name }}</p>
                                                <span class="px-2 py-1 text-success bg-success-subtle fs-9 fw-medium rounded-5">خریدار</span>
                                            </div>
                                        </div>
                                    </div>
                                <!-- like and dis-like -->
                                <div class="gap-3 d-flex justify-content-end">
                                    <!-- like -->
                                       <p class="fs-8 text-secondary">آیا این پاسخ مفید بود؟</p>

                                    <div class="loader vote-loader" wire:loading wire:target="setVoteAnswer('like',{{ $answer->id }}"></div>

                                    <div wire:loading.remove wire:target="setVoteAnswer('like',{{ $answer->id }})">


                                        <button type="button" wire:click="setVoteAnswer('like',{{ $answer->id }})"
                                            class="gap-2 bg-transparent border-0 d-flex align-items-center  {{ $answer->like ? 'text-primary' : 'text-secondary' }}">
                                            <p class="fs-8">{{ $answer->likeCount }}</p>
                                            <svg width="25" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <!-- dislike -->

                                    <div class="loader vote-loader" wire:loading wire:target="setVoteAnswer('dislike',{{ $answer->id }})"></div>
                                    <div wire:loading.remove wire:target="setVoteAnswer('dislike',{{ $answer->id }})">


                                        <button type="button" wire:click="setVoteAnswer('dislike',{{ $answer->id }})"
                                            class="gap-2 bg-transparent border-0 d-flex align-items-center {{ $answer->dislike ? 'text-primary' : 'text-secondary' }}">
                                            <p class="fs-8">{{ $answer->dislikecount }}</p>
                                            <svg width="25" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M7.498 15.25H4.372c-1.026 0-1.945-.694-2.054-1.715a12.137 12.137 0 0 1-.068-1.285c0-2.848.992-5.464 2.649-7.521C5.287 4.247 5.886 4 6.504 4h4.016a4.5 4.5 0 0 1 1.423.23l3.114 1.04a4.5 4.5 0 0 0 1.423.23h1.294M7.498 15.25c.618 0 .991.724.725 1.282A7.471 7.471 0 0 0 7.5 19.75 2.25 2.25 0 0 0 9.75 22a.75.75 0 0 0 .75-.75v-.633c0-.573.11-1.14.322-1.672.304-.76.93-1.33 1.653-1.715a9.04 9.04 0 0 0 2.86-2.4c.498-.634 1.226-1.08 2.032-1.08h.384m-10.253 1.5H9.7m8.075-9.75c.01.05.027.1.05.148.593 1.2.925 2.55.925 3.977 0 1.487-.36 2.89-.999 4.125m.023-8.25c-.076-.365.183-.75.575-.75h.908c.889 0 1.713.518 1.972 1.368.339 1.11.521 2.287.521 3.507 0 1.553-.295 3.036-.831 4.398-.306.774-1.086 1.227-1.918 1.227h-1.053c-.472 0-.745-.556-.5-.96a8.95 8.95 0 0 0 .303-.54" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                </div>
                            @endforeach

                            <!-- new answer -->
                            <div class="pt-3 mt-4 border-top">
                                <button type="button"  class="bg-transparent border-0 text-info fs-8" data-bs-toggle="modal"
                                    data-bs-target="#responseModal">
                                    ثبت پاسخ جدید
                                    <svg width="14" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                                    </svg>
                                </button>
                            </div>
                        </div>

@endforeach

                        <hr style="opacity: 100; margin: 20px 0" />

                        <!-- question has no answer-->


                        <hr style="opacity: 100; margin: 20px 0" />
                        <!-- more question -->
                        <button class="mt-2 bg-transparent border-0 text-info fs-9">
                            100 پرسش دیگر
                            <svg width="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </div>
                    <!-- mobile question -->
                    <div class="d-flex d-lg-none swiper myQuestionSwiper">
                        <div class="swiper-wrapper pe-2">
                            <!-- question has answer-->
                            <div class="swiper-slide ps-3">
                                <div class="p-3">
                                    <!-- question text -->
                                    {{-- <div class="gap-3 mt-4 d-flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor"
                                            class="bi bi-question-square text-info" viewBox="0 0 16 16">
                                            <path
                                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                            <path
                                                d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286m1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94" />
                                        </svg>
                                        <p class="fs-9">گوشی من شب تا صبح ۸ درصد باتری کم می‌کند طبیعیه یا ایراد داره</p>
                                    </div> --}}
                                    <!-- answer -->
                                    <div class="mt-4">
                                        <div class="gap-3 d-flex align-items-start">
                                            <p class="fs-9 fw-medium">پاسخ</p>
                                            <div>
                                                <p class="fs-9">آپدیت کن ایراد داره برا من دو روز یه بار شارژ میکنم عالیه
                                                </p>
                                                <div class="gap-2 mt-5 d-flex align-items-center">
                                                    <p class="fs-9 text-secondary">علی اصفر غلامی</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- question has answer-->
                            <div class="swiper-slide ps-3">
                                <div class="p-3">
                                    <!-- question text -->
                                    {{-- <div class="gap-3 mt-4 d-flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor"
                                            class="bi bi-question-square text-info" viewBox="0 0 16 16">
                                            <path
                                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                            <path
                                                d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286m1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94" />
                                        </svg>
                                        <p class="fs-9">گوشی من شب تا صبح ۸ درصد باتری کم می‌کند طبیعیه یا ایراد داره</p>
                                    </div> --}}
                                    <!-- answer -->
                                    {{-- <div class="mt-4">
                                        <div class="gap-3 d-flex align-items-start">
                                            <p class="fs-9 fw-medium">پاسخ</p>
                                            <div>
                                                <p class="fs-9">آپدیت کن ایراد داره برا من دو روز یه بار شارژ میکنم عالیه
                                                </p>
                                                <div class="gap-2 mt-5 d-flex align-items-center">
                                                    <p class="fs-9 text-secondary">علی اصفر غلامی</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <!-- question has answer-->
                            {{-- <div class="swiper-slide ps-3">
                                <div class="p-3">
                                    <!-- question text -->
                                    <div class="gap-3 mt-4 d-flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor"
                                            class="bi bi-question-square text-info" viewBox="0 0 16 16">
                                            <path
                                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                            <path
                                                d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286m1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94" />
                                        </svg>
                                        <p class="fs-9">گوشی من شب تا صبح ۸ درصد باتری کم می‌کند طبیعیه یا ایراد داره</p>
                                    </div>
                                    <!-- answer -->
                                    <div class="mt-4">
                                        <div class="gap-3 d-flex align-items-start">
                                            <p class="fs-9 fw-medium">پاسخ</p>
                                            <div>
                                                <p class="fs-9">آپدیت کن ایراد داره برا من دو روز یه بار شارژ میکنم عالیه
                                                </p>
                                                <div class="gap-2 mt-5 d-flex align-items-center">
                                                    <p class="fs-9 text-secondary">علی اصفر غلامی</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <!-- question has answer-->
                            <button class="bg-transparent swiper-slide text-info d-flex flex-column justify-content-center">
                                <svg width="25" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                همه
                            </button> --}}
                        </div>
                    </div>

                    <div class="mt-3 d-flex d-lg-none align-items-center justify-content-between">
                        <svg width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                        </svg>
                        <div class="w-75">
                            <p class="fs-9">دیدگاه خود را درباره این کالا بنویسید</p>
                            <p class="fs-9 fw-light text-secondary">
                                با ثبت دیدگاه بر روی کالاهای خریداری شده ۵ امتیاز در دیجی‌کلاب دریافت کنید
                            </p>
                        </div>
                        <svg width="14" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Question modal -->
            <div class="modal fade" id="questionModal" tabindex="-1" aria-labelledby="questionModalLabel" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <form wire:submit="submitQuestion(Object.fromEntries(new FormData($event.target)))">
                        <div class="modal-header">
                            <h6 class="modal-title fs-7" id="questionModalLabel">پرسش خود را درباره این کالا ثبت کنید</h6>
                            <button type="button" class="mx-0 btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="form-group" x-data="textInput" data-limit="100">
                                <textarea id="title" x-model="title" wire:model='title'  name="title" class="form-control" rows="5"></textarea>


                                <p id="remaining">
        شما دارید؟ <span x-text="remaining"></span> حروف باقیمانده .
    </p>
                            </div>
                                @error("title")
                                 <div class="mt-1 alert alert-danger" >{{ $message }}</div>
                                @enderror

                            @if ($submitsuccessalert)
                                <div class="mt-2 alert alert-success">پرسش شما با موفقعیت ثبت شد. بعد از تایید مدیریت نمایش داده میشود.</div>
                            @endif
                                <hr />

                                <button  class="mt-2 btn btn-danger w-100" >ثبت پرسش</button>

                                <p class="my-3 text-center fs-9">
                                    ثبت دیدگاه به معنی موافقت با<a href="#" class="text-info"> قوانین انتشار دیجی‌کالا
                                    </a>است.
                                </p>
                            </div>
                        </div>
                    </form>
                    </div>
                    </div>


                       <div class="modal fade" id="responseModal" tabindex="-1" aria-labelledby="responseModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <form wire:submit="submitANswer(Object.fromEntries(new FormData($event.target)))">











                <div class="modal-header">
                    <h6 class="modal-title fs-7" id="responseModalLabel">پاسخ خود را درباره این کالا ثبت کنید</h6>
                    <button type="button" class="mx-0 btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <div class="form-group" x-data="bodyinput" data-limit="100">
    <textarea x-model="body" wire:model='body' name='body' class="form-control" rows="5"></textarea>
    <input type="hidden" name='questionId' value="{{ $row->id }}" />
    <p id="remaining">شما دارید؟ <span x-text="remaining"></span> حروف باقیمانده.</p>
</div>
                    @error('body')
                        <div class="mt-1 alert alert-danger">{{ $message }}</div>
                    @enderror
                    @if ($submitsuccessquestionalert)
                        <div class="mt-2 alert alert-success">پاسخ شما با موفقعیت ثبت شد. بعد از تایید مدیریت نمایش داده میشود.</div>
                    @endif
                </div>
                <hr />
                <button class="mt-2 btn btn-danger w-100">ثبت پرسش</button>
                <p class="my-3 text-center fs-9">ثبت دیدگاه به معنی موافقت با<a href="#" class="text-info"> قوانین انتشار دیجی‌کالا</a> است.</p>
            </form>
        </div>
    </div>
</div>







            <!-- details -->
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
            <!-- comments -->
            <div id="comment-content" class="content-div mx-lg-5 {{ $activeTab == 4 ? 'active' : '' }}"  wire:ignore.self>
                <div class="mb-3 d-flex flex-column">
                    <h5>امتیاز و دیدگاه کاربران</h5>
                    <div class="border-title"></div>
                </div>
                <div class="content-section row">
                    <!-- scores  -->
                    <div class="top-0 d-none d-lg-block col-lg-3 position-sticky start-0">
                        <!-- score -->
                        <div class="gap-2 d-flex">
                            <p class="fs-4 fw-bold">4.6 <span class="fs-9">از 5</span></p>
                        </div>
                        <!-- stars -->
                        <div class="gap-2 d-flex align-items-center">
                            <div>
                                <!-- fill stars -->
                                <svg width="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="text-warning">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <svg width="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="text-warning">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <svg width="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="text-warning">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <svg width="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="text-warning">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <!-- outline star -->
                                <svg width="15" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="text-warning">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                </svg>
                            </div>
                            <p class="fs-9 text-secondary">از مجموع <span>۴۷</span> امتیاز</p>
                        </div>
                        <p class="mt-3 text-secondary fs-9">شما هم درباره این کالا دیدگاه ثبت کنید</p>

                        <button class="my-3 btn btn-outline-danger w-75 fs-8" data-bs-toggle="modal"
                            data-bs-target="#commentModal">
                            ثبت دیدگاه
                        </button>

                        <p class="fs-9">
                            <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="ms-1 text-secondary">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                            </svg>
                            با ثبت دیدگاه بر روی کالاهای خریداری شده ۵ امتیاز در دیجی‌کلاب دریافت کنید
                        </p>
                    </div>
                    <!-- comments -->
                   <div class="col col-lg-9">
                <!-- people score -->

                <div class="gap-1 d-none d-lg-flex align-items-center">
                  <svg
                    width="16"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="text-success">
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                  </svg>
                  <p class="fs-9 text-secondary">۹۳% (۲۰ نفر) از خریداران، این کالا را پیشنهاد کرده‌اند</p>
                  <button
                    type="button"
                    class="bg-transparent border-0"
                    data-bs-toggle="tooltip"
                    data-bs-placement="bottom"
                    title="خریداران کالا با انتخاب یکی از گزینه های پیشنهاد یا عدم پیشنهاد، تجربه خرید خود را با کاربران به اشتراک میگذارند">
                    <svg
                      width="15"
                      height="15"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      class="text-secondary">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                  </button>
                </div>
                <!-- more image -->
                <div class="gap-2 my-4 d-flex align-items-center">
                  <button
                    style="width: 8%"
                    type="button"
                    class="p-0 m-0 bg-transparent border opacity-50 rounded-2"
                    data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <img
                      src="/client/assets/Product/nothingPhone/1.webp"
                      alt="image"
                      class="p-1 w-75 h-50 object-fit-contain" />
                  </button>
                  <button
                    style="width: 8%"
                    type="button"
                    class="p-0 m-0 bg-transparent border opacity-50 rounded-2"
                    data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <img
                      src="/client/assets/Product/nothingPhone/3.webp"
                      alt="image"
                      class="p-1 w-75 h-50 object-fit-contain" />
                  </button>
                </div>
                <button
                  class="bg-transparent border-0 d-none d-lg-block text-info fs-8"
                  style="width: 8%"
                  type="button"
                  data-bs-toggle="modal"
                  data-bs-target="#exampleModal">
                  بیشتر
                </button>

                <hr />

                {{-- <!-- sorting header -->
                <div class="d-none d-lg-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-start">
                    <div class="gap-1 d-flex align-items-center">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        fill="currentColor"
                        class="bi bi-sort-down"
                        viewBox="0 0 16 16">
                        <path
                          d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z" />
                      </svg>
                      <p class="fs-8 fw-bold">مرتب سازی:</p>
                    </div>
                    <ul id="colorList" class="gap-3 d-flex align-items-center fs-8">
                      <li class="text-danger">جدیدترین</li>
                      <li>دیدگاه خریداران</li>
                      <li>مفیدترین</li>
                    </ul>
                  </div>
                  <div>
                    <p class="fs-9 text-secondary">69 دیدگاه</p>
                  </div>
                </div>

                <!-- users rating -->
                <div class="mt-4 d-none d-lg-block">
                  <div class="gap-2 d-flex">
                    <button type="button" class="px-3 py-2 border btn rounded-5 fs-8 fw-bold">کیفیت و کارایی</button>
                    <button type="button" class="px-3 py-2 border btn rounded-5 fs-8 fw-bold">قیمت و ارزش خرید</button>
                    <button type="button" class="px-3 py-2 border btn rounded-5 fs-8 fw-bold">شباهت یا مغایرت</button>
                  </div>
                  <p class="mt-3 fs-9 text-secondary">این دسته‌بندی توسط هوش مصنوعی انجام شده و ممکن است دقیق نباشد</p>
                </div> --}}

                <hr />
                <!-- comment componnet -->
@foreach ($productReviews as $item)
    <div>
        <!-- comment header -->
        <div class="my-4 d-flex align-items-center justify-content-between">
            <div class="gap-2 d-flex align-items-center">
                <p class="fs-9 text-secondary">{{ $item->user->name }}</p>
                <span class="px-2 py-1 text-success bg-success-subtle fs-9 fw-medium rounded-5">خریدار</span>
                <p class="opacity-25">&bull;</p>
                <p class="fs-9 text-secondary">{{ $item->created_at->diffForHumans() }}</p>
            </div>
            <button class="bg-transparent border-0">
                <svg width="18" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="text-secondary">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                </svg>
            </button>
        </div>
        <!-- rating -->
        <div>
            <!-- stars -->
            <div class="gap-1 d-flex align-items-center">
                <svg width="22" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="text-warning">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                        clip-rule="evenodd" />
                </svg>
                <svg width="22" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="text-warning">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                        clip-rule="evenodd" />
                </svg>
                <svg width="22" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="text-warning">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                        clip-rule="evenodd" />
                </svg>
                <svg width="22" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="text-warning">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                        clip-rule="evenodd" />
                </svg>
                <svg width="22" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="text-warning">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <p class="mt-3 text-success fs-8 fw-semibold">
                <svg width="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                </svg>
                پیشنهاد میکنم
            </p>
        </div>
        <!-- comment text -->
        <div class="my-4">
            <h6 class="mb-3 fw-bold">{{ $item->title }}</h6>
            <p>
                {{ $item->comment }}
            </p>
        </div>
        <!-- Positive and negative points -->
        <div>
            <!-- ++ Positive poinst ++ -->
            <!-- number.1 -->

            @foreach (explode(',', $item->positive) as $row)
                <div class="gap-1 my-2 d-flex align-items-center">
                    <svg width="18" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="text-success">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <p class="fs-8">{{ $row }}</p>
                </div>
            @endforeach

            <!-- number.2 -->

            <!-- -- Negative poinst -- -->
            <!-- number.1 -->
             @foreach (explode(',', $item->negative) as $row)
            <div class="gap-1 my-2 d-flex align-items-center">
                <svg width="18" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="text-danger">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                </svg>
                <p class="fs-8">{{ $row }}</p>
            </div>

            @endforeach
        </div>
        <!-- seller name , color , like-dislike -->
        <div class="mt-4 d-flex align-items-center justify-content-between">
            <!-- seller name , color -->
            <div class="gap-4 d-flex align-items-center">
                <div class="gap-2 d-flex align-items-center">
                    <svg width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                    </svg>
                    <p class="fs-9 text-secondary">{{ $sellerName }}</p>
                </div>
                <div class="opacity-25">&bull;</div>
                <div class="gap-2 d-flex align-items-center">
                    <span style="width: 15px; height: 15px" class="bg-black rounded-5"></span>
                    <p class="fs-8 text-secondary">مشکی</p>
                </div>
            </div>
            <!-- like and dis-like -->
            <div class="gap-3 d-flex align-items-center">
                <!-- like -->

                <div class="loader vote-loader" wire:loading wire:target="setVote('like',{{ $item->id }}"></div>

           <div wire:loading.remove wire:target="setVote('like',{{ $item->id }})">


                <button type="button" wire:click="setVote('like',{{ $item->id }})"
                    class="gap-2 bg-transparent border-0 d-flex align-items-center  {{ $item->like ? 'text-primary' : 'text-secondary' }}">
                    <p class="fs-8">{{ $item->likeCount }}</p>
                    <svg width="25" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                    </svg>
                </button>
           </div>
                <!-- dislike -->

                <div class="loader vote-loader" wire:loading wire:target="setVote('dislike',{{ $item->id }})"></div>
               <div wire:loading.remove wire:target="setVote('dislike',{{ $item->id }})">


                <button type="button" wire:click="setVote('dislike',{{ $item->id }})"
                    class="gap-2 bg-transparent border-0 d-flex align-items-center {{ $item->dislike ? 'text-primary' : 'text-secondary' }}">
                    <p class="fs-8">{{ $item->dislikecount }}</p>
                    <svg width="25" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7.498 15.25H4.372c-1.026 0-1.945-.694-2.054-1.715a12.137 12.137 0 0 1-.068-1.285c0-2.848.992-5.464 2.649-7.521C5.287 4.247 5.886 4 6.504 4h4.016a4.5 4.5 0 0 1 1.423.23l3.114 1.04a4.5 4.5 0 0 0 1.423.23h1.294M7.498 15.25c.618 0 .991.724.725 1.282A7.471 7.471 0 0 0 7.5 19.75 2.25 2.25 0 0 0 9.75 22a.75.75 0 0 0 .75-.75v-.633c0-.573.11-1.14.322-1.672.304-.76.93-1.33 1.653-1.715a9.04 9.04 0 0 0 2.86-2.4c.498-.634 1.226-1.08 2.032-1.08h.384m-10.253 1.5H9.7m8.075-9.75c.01.05.027.1.05.148.593 1.2.925 2.55.925 3.977 0 1.487-.36 2.89-.999 4.125m.023-8.25c-.076-.365.183-.75.575-.75h.908c.889 0 1.713.518 1.972 1.368.339 1.11.521 2.287.521 3.507 0 1.553-.295 3.036-.831 4.398-.306.774-1.086 1.227-1.918 1.227h-1.053c-.472 0-.745-.556-.5-.96a8.95 8.95 0 0 0 .303-.54" />
                    </svg>
                </button>
               </div>
            </div>
        </div>
    </div>
@endforeach


                <hr />

                <!-- comment componnet -->

                <hr />
                <!-- more comment -->
                <button class="mt-2 bg-transparent border-0 text-info fs-9">
                  65 دیدگاه دیگر
                  <svg
                    width="16"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
            <!-- comment modal -->
            <div class="modal fade" wire:ignore.self

            id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title fs-7" id="commentModalLabel">دیدگاه و امتیاز من</h6>
                            <button type="button" class="mx-0 btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))">
                            <div class="modal-body">
                                <div class="d-flex align-items-start justify-content-center">
                                    <div>
                                        <img src="/client/assets/Product/nothingPhone/1.webp" alt="phone" width="70" />
                                        <p class="mt-4 fs-9 text-secondary fw-light">

                                            {{ $this->afghanDate }}
                                        </p>
                                    </div>
                                    <h5 class="px-5 fs-7">{{ $name }}</h5>
                                </div>
                                <hr />
                                <h6 class="my-5 fs-7 fw-bold">دیدگاه خود را شرح دهید</h6>

                                <div class="mb-3">
                                    <label for="commentTitle" class="form-label fs-8">عنوان نظر</label>
                                    <input wire:model='title' type="text" name="title" class="form-control fs-8" id="commentTitle" />
                                </div>
                                @error('title')
                                    <div class="mt-2 alert alert-danger" >{{ $message }}</div>
                                @enderror
                                <!-- Positive Points Section -->
                                <h6 class="mt-5 fs-8">نکات مثبت</h6>
                                <div class="mt-3 border form-group d-flex align-items-center justify-content-between rounded-3">
                                    <input type="text" wire:model='InputPositive' id="inputTextPositive" class="border-0 form-control" />
                                    <button type="button" id="addButtonPositive" wire:click="addItem('positive')" class="m-2 bg-transparent border-0 fs-3">+</button>
                                </div>
                                @error('InputPositive')
                                    <div class="mt-2 alert alert-danger" >{{ $message }}</div>
                                @enderror
                                <ul id="positiveList" class="p-0 list-group" >
                                    <!-- Positive points will be added here -->
                                    @foreach ($positiveItems as $index => $item)
                                        <li class="my-2 border-0 list-group-item d-flex justify-content-between align-items-center">
                                            <div class="gap-2 d-flex align-items-center" bis_skin_checked="1">
                                                <svg width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" class="text-success">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                                                </svg>
                                                {{$item}}
                                            </div>
                                            <button wire:click="removeItem('positive',{{ $index }})" class="bg-transparent border-0 deleteButton">
                                                <svg width="18" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" class="text-secondary">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0">
                                                    </path>
                                                </svg>
                                            </button>
                                        </li>
                                    @endforeach

                                </ul>

                                <!-- Negative Points Section -->
                                <h6 class="mt-5 fs-8">نکات منفی</h6>
                                <div class="mt-3 border form-group d-flex align-items-center justify-content-between rounded-3">
                                    <input wire:model='InputNegative' type="text" id="inputTextNegative" class="border-0 form-control" />
                                    <button type="button" id="addButtonNegative" class="m-2 bg-transparent border-0 fs-3" wire:click="addItem('Negative')">+</button>
                                </div>

                                @error('InputNegative')
                                    <div class="mt-2 alert alert-danger" >{{ $message }}</div>
                                @enderror
                            <ul id="negativeList" class="p-0 list-group" >
                                <!-- Negative points will be added here -->
                                @foreach ($NegativeItems as $index => $item)
                                      <li class="my-2 border-0 list-group-item d-flex justify-content-between align-items-center">
                                        <div class="gap-2 d-flex align-items-center" bis_skin_checked="1">
                                            <svg width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="text-danger">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15"></path>
                                            </svg>
                                           {{ $item }}
                                        </div>
                                        <button wire:click="removeItem('Negative',{{ $index }})" class="bg-transparent border-0 deleteButton">
                                            <svg width="18" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="text-secondary">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0">
                                                </path>
                                            </svg>
                                        </button>
                                    </li>
                                @endforeach

                            </ul>

                                <!-- comment textarea -->
                                <div class="mt-5">
                                    <label for="exampleFormControlTextarea1" class="form-label fs-8">متن نظر<span
                                            class="text-danger">*</span></label>
                                    <textarea wire:model='comment' name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        placeholder="برای ما بنویسید/client."></textarea>
                                </div>

                                @error('comment')
                                    <div class="mt-2 alert alert-danger" >{{ $message }}</div>
                                @enderror

                                <div class="flex-row-reverse mt-4 form-check d-flex justify-content-end align-items-center">
                                    <label class="form-check-label fs-8 fw-bold" for="flexCheckDefault">
                                        ارسال دیدگاه به صورت ناشناس
                                    </label>
                                    <input class="form-check-input ms-2" type="checkbox" value="" id="flexCheckDefault" />
                                </div>

                                <hr />

                                <button  class="mt-3 btn btn-danger w-100">ثبت امتیاز و دیدگاه</button>
                                @if ($submitsuccessalert)
                                    <div class="mt-2 alert alert-success">دیدگاه شما با موفقعیت ثبت شد. بعد از تایید مدیریت نمایش داده میشود.</div>
                                    <p class="my-3 text-center fs-9">
                                        ثبت دیدگاه به معنی موافقت با<a href="#" class="text-info"> قوانین انتشار دیجی‌کالا </a>است.
                                    </p>
                                    </div>
                                @endif


                        </form>

                    </div>
                </div>
            </div>
            <!-- questions -->

        </div>
    </section>

</div>
@push('scripts')
    <script>
        document.addEventListener("alpine:init", () => {

             Alpine.data("textInput", function () {
                return {
                    title: "",
                    limit: 100,
                    init() {
                        this.limit = parseInt(this.$el.dataset.limit) || 100; // دریافت محدودیت از data-limit
                    },
                    get remaining() {
                        return this.limit - this.title.length;
                    }
                };
            });

            Alpine.data("bodyinput", function () {
                return {
                    body: "", // مقدار اولیه
                    limit: parseInt(this.$el.dataset.limit) || 100, // مقدار پیش‌فرض از data-limit
                    init() {
                        // اینجا می‌توانیم مقدار data-limit را بگیریم
                        this.limit = parseInt(this.$el.dataset.limit) || 100;
                    },
                    get remaining() {
                        // اطمینان از اینکه body همیشه یک رشته است
                        return this.limit - String(this.body).trim().length;
                    }
                };
            });
        });
    </script>
@endpush









