<div class="statbox widget box box-shadow">
    <div class="widget-header">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>
                    محتوا برای محصول
                    {{ $productName}}

                </h4>
            </div>
        </div>
    </div>
    <div class="widget-content widget-content-area">

        <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))">
            <div class="mb-4 row">
                <div class="col-sm-12">
                    <label for="short_description">معرفی محصول</label>
                    <textarea class="form-control" id="short_description" rows="10" name="short_description" wire:model="short_description"
                        placeholder=""></textarea>
                </div>
            </div>
            @error('short_description')
                <div class="mt-2 border-0 alert alert-light-danger alert-dismissible fade show" role="alert" wire:loading.remove>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <svg> ...</svg>
                    </button>
                    <strong>خطا !</strong> {{$message}}.</button>
                </div>

            @enderror
            <div class="mb-4 row">
                <div class="col-sm-12" wire:ignore>
                    <label for="long_description">بررسیی تخصصی </label>
                    <textarea class="form-control" id="long_description" name="long_description"
                        wire:model="longDescription" placeholder=""></textarea>
                </div>
            </div>
            @error('longDescription')
                <div class="mt-2 border-0 alert alert-light-danger alert-dismissible fade show" role="alert" wire:loading.remove>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <svg> ...</svg>
                    </button>
                    <strong>خطا !</strong> {{$message}}.</button>
                </div>

            @enderror
            <div class="text-left">
                <button type="submit" class="btn btn-primary">ذخیره</button>
            </div>


        </form>


    </div>
    @push('scripts')

        <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>

        <script>
             document.addEventListener('livewire:init', () => {

              const editor=CKEDITOR.replace('long_description', {
                filebrowserUploadUrl: "{{route('admin.ck-uplode', [$productId, '_token' => csrf_token()])}}",
                  filebrowserUploadMethod: 'form',


                    contentsLangDirection: 'rtl',
                    height: 200
                })
               editor.on('change', (event) => {
                    @this.set('longDescription', event.editor.getData())
                })

            })

        </script>
    @endpush
</div>
