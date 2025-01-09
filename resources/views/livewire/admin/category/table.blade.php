<div class="col-md-8">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>لیست دسته بندی ها </h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">اسم دسته بندی</th>
                                   <th scope="col">دسته بندی والد</th>
                                <th class="text-center" scope="col">وضعیت</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allCategories as $category)
                            <tr>
                                <td>
                              {{ $loop->iteration + ($allCategories->first() ? $allCategories->first()->id : 0) - 1 }}


                                </td>
                                <td>{{ $category->name  }}</td>
                                <td>{{ $category->parent->name }}</td>
                                <td class="text-center">
                                    <div class="action-btn">
                                        <a href="javascript:void(0);" wire:click="edit({{ $category->id }})" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                            </svg>
                                        </a>

                                        <a href="javascript:void(0);" class="action-btn btn-delete bs-tooltip" wire:click="deleteConfirmation({{ $category->id }})"data-toggle="tooltip" data-placement="top" title="Delete">
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
                     {{$allCategories->links('layouts.admin.pagination')}}
                </div>

            </div>
        </div>
    </div>
