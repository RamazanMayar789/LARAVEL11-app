<div x-intersect="initializeSwiper">
<section class="p-0 mt-4 container-fluid container-lg story">
    <div class="py-2 d-flex py-lg-5 py-md-3 justify-content-center align-items-center">
        <div class="px-0 swiper myStorySwiper">
            <div class="swiper-wrapper">

                @foreach ($stories as $item)
                    <div data-story="/stories/story/{{ $item->story }}"
                    class="swiper-slide d-flex flex-column justify-content-center story-item" data-bs-toggle="modal"
                        data-bs-target="#storymodal">
                        <a href="#">
                            <img width="80" height="80" src="stories/thumbnail/{{ $item->thumbnail }}" alt="story" />
                        </a>
                        <p class="my-2 text-center fw-medium fs-7">{{ $item->title }}</p>
                    </div>
                @endforeach



            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>

<!-- Story Modal -->
<div class="modal fade" id="storymodal" tabindex="-1" aria-labelledby="storymodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="bg-transparent border-0 modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="bg-white btn-close rounded-4" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="storymodal" class="carousel slide">
                    <div class="carousel-indicators">

                    </div>
                    <div class="pb-5 carousel-inner">
                        <div class="carousel-item active">
                        <video id="videoplayer" class="rounded-10" controls width="500" height="300">
                            <source id="videosource" src="" type="video/mp4">

                            your browser does not support video tag
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
