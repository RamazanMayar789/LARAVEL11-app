<div class="mt-3 widget-content widget-content-area ecommerce-create-section">




    <div class="row">
        <div class="col-md-12">
            <label for="product-images">آپلود تصاویر محصول</label>
            <div class="multiple-file-upload">

                <div class="field-wrapper" x-data="{isUploading:false,progress:0 }"
                    x-on:livewire-upload-progress="progress=$event.detail.progress"
                    x-on:livewire-upload-finish="isUploading=false" x-on:livewire-upload-error="isUploading=false"
                    x-on:livewire-upload-start="isUploading=true">



                    <input class="form-control" type="file" name="photos" id="photos" wire:model="photos" multiple />

                    <div x-show="isUploading" class="mt-3 progress ltr">
                        <div class="progress-bar progress-bar-striped bg-primary progress-bar-animated"
                            role="progressbar" x-bind:style="`width:${progress}%`" aria-valuenow="10" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>

                </div>

                <div class="d-flex">
                    @foreach ($photos as $photo)
                        @if(in_array($photo->getMimeType(), ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp']))
                            <div class="m-3 item w-25">
                                <img src="{{ $photo->temporaryUrl() }}" class="w-100" alt="" />
                            </div>
                        @endif
                    @endforeach

                </div>
                @error('photos')
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

</div>
