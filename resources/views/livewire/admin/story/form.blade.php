<div class="col-md-4">

    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>مدیریت استوری ها </h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">

            <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))">

                <div class="mb-4 row">
                    <div class="col-sm-12">
                        <label for="title" class="form-label">عنوان</label>
                        <input type="text" class="form-control" id="title" wire:model="title" name="title"
                            placeholder="">
                    </div>
                </div>

                @error('title')
                    <div class="mb-4 border-0 alert alert-light-danger alert-dismissible fade show" role="alert"
                        wire:loading.remove>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <svg> ...</svg>
                        </button>
                        <strong>خطا !</strong> {{$message}}.</button>
                    </div>
                @enderror
                <div class="mb-4 field-wrapper" x-data="{isUploading:false,progress:0 }"
                    x-on:livewire-upload-start="isUploading=true" x-on:livewire-upload-finish="isUploading=false"
                    x-on:livewire-upload-error="isUploading=false"
                    x-on:livewire-upload-progress="progress=$event.detail.progress">

                    <label for="thumbnail" class="form-label">تصویر بند انگشتی</label>
                    <input type="file" class="form-control" id="thumbnail" wire:model="thumbnail" name="thumbnail"
                        placeholder="">

                    <div x-show="isUploading" class="mt-3 progress ltr">
                        <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated"
                            role="progressbar" x-bind:style="`width:${progress}%`" aria-valuenow="10" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>

                </div>

                @error('thumbnail')
                    <div class="mb-4 border-0 alert alert-light-danger alert-dismissible fade show" role="alert"
                        wire:loading.remove>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <svg> ...</svg>
                        </button>
                        <strong>خطا !</strong> {{$message}}.</button>
                    </div>
                @enderror

                <div class="mb-4 field-wrapper" x-data="{isUploading:false,progress:0 }"
                    x-on:livewire-upload-start="isUploading=true" x-on:livewire-upload-finish="isUploading=false"
                    x-on:livewire-upload-error="isUploading=false"
                    x-on:livewire-upload-progress="progress=$event.detail.progress">
                    <label for="story" class="form-label">استوری</label>
                    <input type="file" class="form-control" id="story" wire:model="story" name="story" placeholder="">

                    <div x-show="isUploading" class="mt-3 progress ltr">
                        <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated"
                            role="progressbar" x-bind:style="`width:${progress}%`" aria-valuenow="10" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>

                </div>

                @error('story')
                    <div class="mb-4 border-0 alert alert-light-danger alert-dismissible fade show" role="alert"
                        wire:loading.remove>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <svg> ...</svg>
                        </button>
                        <strong>خطا !</strong> {{$message}}.</button>
                    </div>
                @enderror



                <button type="submit" class="btn btn-primary _effect--ripple waves-effect waves-light">
                    <span wire:loading.remove> ثبت</span>
                    <div class="text-white spinner-border me-2 align-self-center loader-sm " wire:loading></div>
                </button>
            </form>

        </div>
    </div>
</div>