<div class="statbox widget box box-shadow">
<form wire:submit="submit(Object.fromEntries(new FormData($event.target)))">
    @foreach ($features as $feature)
        <div class="row">
            <div class="col-md-2">

                <h6>{{ $feature->name }}</h6>

            </div>

            <div class=" col-md-6">

                <select class="mb-3 form-select" id="featureValue" name="featureValue[{{ $loop->index }}]">
                    @forelse($feature->categoryFeatureValues as $value)

                        <option value="{{@$feature->id}}_{{$value->id}}">
                            {{@$value->value}}
                        </option>

                    @empty
                        dwad
                    @endforelse

                </select>
            </div>
        </div>
    @endforeach
    @error('feature_ids.*')
        <div class="mt-2 border-0 alert alert-light-danger alert-dismissible fade show" role="alert" wire:loading.remove>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <svg> ...</svg>
            </button>
            <strong>خطا !</strong> {{$message}}.</button>
        </div>

    @enderror
    <div class="text-left col-sm-12">
        <button type="submit" class="btn btn-primary">
            <span wire:loading.remove wire:target="submit">ثبت</span>
            <div class="text-white spinner-border me-2 align-self-center loader-sm" wire:loading wire:target="submit"></div>
        </button>
    </div>
</form>



</div>
