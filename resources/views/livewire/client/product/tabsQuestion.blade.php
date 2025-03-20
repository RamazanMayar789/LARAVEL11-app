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
                    <p class="fs-9 text-secondary">{{ $count }} پرسش</p>
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
                                        <span
                                            class="px-2 py-1 text-success bg-success-subtle fs-9 fw-medium rounded-5">خریدار</span>
                                    </div>
                                </div>
                            </div>
                            <!-- like and dis-like -->
                            <div class="gap-3 d-flex justify-content-end">
                                <!-- like -->
                                <p class="fs-8 text-secondary">آیا این پاسخ مفید بود؟</p>

                                <div class="loader vote-loader" wire:loading
                                    wire:target="setVoteAnswer('like',{{ $answer->id }}"></div>

                                <div wire:loading.remove wire:target="setVoteAnswer('like',{{ $answer->id }})">


                                    <button type="button" wire:click="setVoteAnswer('like',{{ $answer->id }})"
                                        class="gap-2 bg-transparent border-0 d-flex align-items-center  {{ $answer->like ? 'text-primary' : 'text-secondary' }}">
                                        <p class="fs-8">{{ $answer->likeCount }}</p>
                                        <svg width="25" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                                        </svg>
                                    </button>
                                </div>
                                <!-- dislike -->

                                <div class="loader vote-loader" wire:loading
                                    wire:target="setVoteAnswer('dislike',{{ $answer->id }})"></div>
                                <div wire:loading.remove wire:target="setVoteAnswer('dislike',{{ $answer->id }})">


                                    <button type="button" wire:click="setVoteAnswer('dislike',{{ $answer->id }})"
                                        class="gap-2 bg-transparent border-0 d-flex align-items-center {{ $answer->dislike ? 'text-primary' : 'text-secondary' }}">
                                        <p class="fs-8">{{ $answer->dislikecount }}</p>
                                        <svg width="25" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
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
                        <button type="button" class="bg-transparent border-0 text-info fs-8" data-bs-toggle="modal"
                            data-bs-target="#responseModal">
                            ثبت پاسخ جدید
                            <svg width="14" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
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
<div class="modal fade" id="questionModal" tabindex="-1" aria-labelledby="questionModalLabel" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form wire:submit="submitQuestion(Object.fromEntries(new FormData($event.target)))">
                <div class="modal-header">
                    <h6 class="modal-title fs-7" id="questionModalLabel">پرسش خود را درباره این کالا ثبت کنید
                    </h6>
                    <button type="button" class="mx-0 btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="form-group" x-data="textInput" data-limit="100">
                        <textarea id="title" x-model="title" wire:model='title' name="title" class="form-control"
                            rows="5"></textarea>


                        <p id="remaining">
                            شما دارید؟ <span x-text="remaining"></span> حروف باقیمانده .
                        </p>
                    </div>
                    @error("title")
                        <div class="mt-1 alert alert-danger">{{ $message }}</div>
                    @enderror

                    @if ($submitsuccessalert)
                        <div class="mt-2 alert alert-success">پرسش شما با موفقعیت ثبت شد. بعد از تایید مدیریت نمایش
                            داده میشود.</div>
                    @endif
                    <hr />

                    <button class="mt-2 btn btn-danger w-100">ثبت پرسش</button>

                    <p class="my-3 text-center fs-9">
                        ثبت دیدگاه به معنی موافقت با<a href="#" class="text-info"> قوانین انتشار دیجی‌کالا
                        </a>است.
                    </p>
                </div>
        </div>
        </form>
    </div>
</div>


<div class="modal fade" id="responseModal" tabindex="-1" aria-labelledby="responseModalLabel" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form wire:submit="submitANswer(Object.fromEntries(new FormData($event.target)))">











                <div class="modal-header">
                    <h6 class="modal-title fs-7" id="responseModalLabel">پاسخ خود را درباره این کالا ثبت کنید
                    </h6>
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
                        <div class="mt-2 alert alert-success">پاسخ شما با موفقعیت ثبت شد. بعد از تایید مدیریت نمایش
                            داده میشود.</div>
                    @endif
                </div>
                <hr />
                <button class="mt-2 btn btn-danger w-100">ثبت پرسش</button>
                <p class="my-3 text-center fs-9">ثبت دیدگاه به معنی موافقت با<a href="#" class="text-info">
                        قوانین انتشار دیجی‌کالا</a> است.</p>
            </form>
        </div>
    </div>
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
