<?php

namespace App\Livewire\Admin\Delivery;

use App\Models\DeliveryMethod;
use App\Repositories\admin\DeliveryRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

private $repository;
public $name;
public $price;
public $delete_id;
public $deliveryId;

public function boot(DeliveryRepositoryInterface $repository) {

    $this->repository = $repository;

}

    public function submit($FormData)
    {

        $validator = Validator::make($FormData, [
            'name' => 'required|string|max:30',
            'price' => 'required|numeric',
        ], [
            '*.required' => 'فیلد ضروری است.',
            '*.string' => 'فرمت اشتباه است !',
            '*.numeric' => 'قیمت باید به صورت عددی باشد',
            '*.max' => 'حداکثر تعداد کاراکترها : 30',
        ]);

        $validator->validate();
        $this->resetValidation();
        $this->repository->submit($FormData, $this->deliveryId);
        $this->reset();
        $this->dispatch('success', 'عملیات با موفقیت انجام شد!');

    }



    public function deleteConfirmation($id)
    {

        $this->delete_id = $id;
        $this->dispatch('deleteshow');
    }
    #[On('deleteconfirmated')]
    public function deleteconfirmated()
    {

        DeliveryMethod::query()->where('id', $this->delete_id)->delete();
        $this->dispatch('success', 'عملیات حذف با موفقیت انجام شد!');
    }




    public function edit($deliveryId)
    {

        $delivery = DeliveryMethod::query()->where('id', $deliveryId)->first();

        if ($delivery) {
            $this->name = $delivery->name;
            $this->price = $delivery->price;
            $this->deliveryId = $delivery->id;
        }

    }



    public function render()
    {

        $deliveries=DeliveryMethod::query()->paginate(10);
        return view('livewire.admin.delivery.index',
[
    'deliveries' => $deliveries
]
        )->layout('layouts.admin.app');
    }
}
