<div class="row">
    <div class="col-md-4">
        <div class="row">
            <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>مدیریت زون ها </h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))">
                            <div class="mb-4 row">
                                <div class="col-sm-12">
                                    <label class="form-label" for="name">نام زون</label>
                                    <input type="text" class="form-control" wire:model='name' id="name" name="name" placeholder="لطفا نام زون خود را وارد کنید">
                                </div>
                            </div>
                            @error('name')
                            <div wire:loading.remove class="mb-4 border-0 alert alert-light-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-bs-dismiss="alert">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                             <div class="mb-4 row">
                                <div class="col-sm-12">

                                    <label class="form-label" for="country">نام کشور</label>
                                   <select id="country" placeholder="انتخاب کشور" class="form-control" name="country">
                                    @foreach ($countries as $country)

                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach

                                   </select>
                                </div>
                            </div>
                            @error('country')
                            <div wire:loading.remove class="mb-4 border-0 alert alert-light-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-bs-dismiss="alert">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <button type="submit" class="btn btn-primary">
                                <span wire:loading.remove wire:target="submit">ثبت</span>
                                <div class="text-white spinner-border me-2 align-self-center loader-sm" wire:loading wire:target="submit"></div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>لیست زون ها </h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">اسم زون</th>
                                <th class="text-center" scope="col">وضعیت</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($states as $state)
                            <tr>
                                <td>
                              {{ $loop->iteration + ($states->first() ? $states->first()->id : 0) - 1 }}


                                </td>
                                <td>{{ $state->name }}</td>
                                <td class="text-center">
                                    <div class="action-btn">
                                        <a href="javascript:void(0);" wire:click="edit({{ $state->id }})" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                            </svg>
                                        </a>

                                        <a href="javascript:void(0);" class="action-btn btn-delete bs-tooltip" wire:click="deleteConfirmation({{ $state->id }})"data-toggle="tooltip" data-placement="top" title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                     {{$states->links('layouts.admin.pagination')}}
                </div>

            </div>
        </div>
    </div>
</div>
