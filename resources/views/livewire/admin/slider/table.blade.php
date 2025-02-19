<div class="col-md-8">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>لیست روش  ها ارسال</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"> عنوان</th>
                                   <th scope="col">تصویر بند انگشتی</th>
                                   <th scope="col">استوری</th>
                                <th class="text-center" scope="col">وضعیت</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $item)
                                <tr>
                                    <td>
                                  {{ $loop->iteration + ($sliders->first() ? $sliderss->first()->id : 0) - 1 }}


                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td><img src="/sliders/image/{{$item->image}}" width="50" alt="not" ></td>
                                    <td>
                                        <button data-story="/sliders/story/{{$item->story}}" type="button" class="mr-2 btn btn-primary"
                                             data-bs-toggle="modal" data-bs-target="#StoryModal">
                                          نمایش استوری
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <div class="action-btn d-flex align-item-center">


                                            <a href="javascript:void(0);" class="action-btn btn-delete bs-tooltip" wire:click="deleteConfirmation({{ $item->id }})"data-toggle="tooltip" data-placement="top" title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                </svg>
                                            </a>
                                            <div wire:change='changestatus({{ $item->id }})' class="text-center form-check form-check-primary form-check-inline ms-3">
                                                <input
                                                {{ $item->status ? 'checked' : ''}}
                                                class="form-check-input" type="checkbox" id="form-check-default">

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="StoryModal" tabindex="-1" role="dialog" aria-labelledby="StoryModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" id="StoryModal">
                    <button type="button" class="text-white btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="p-0 modal-body">

                        <video id="videoplayer" controls width="500" height="300" >
                            <source id="videosource" src="" type="video/mp4">

                                your browser does not support video tag

                </div>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript">

    $(document).ready(function() {
    // به تمام دکمه‌های با ویژگی data-story event listener اضافه کنید
    $('button[data-story]').on('click', function () {
        // دریافت URL ویدیو از data-story
        var storyUrl = $(this).data('story');
        var storyTitle = $(this).data('story-title');

        // تنظیم URL به عنوان src تگ video
        $('#videosource').attr('src', storyUrl);
        $('.modal-title').html(storyTitle);

        // بارگذاری و پخش ویدیو
        var videoPlayer = $('#videoplayer').get(0);
       videoplayer.volume = 0.1;
        videoPlayer.load();
        videoPlayer.play();

    });

    // هنگامی که مدال بسته می‌شود
    $('#StoryModal').on('hide.bs.modal', function () {
        var videoPlayer = $('#videoplayer').get(0);
        videoPlayer.pause(); // توقف ویدیو
        videoPlayer.currentTime = 0; // تنظیم ویدیو به ابتدای آن
    });

    });


    </script>
