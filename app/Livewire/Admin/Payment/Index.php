<?php

namespace App\Livewire\Admin\Payment;

use App\Models\PaymentMethod;
use App\Repositories\admin\PaymentMethodeRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{

    private $repository;
    public $PaymentId;
    public $delete_id;

    public $name;
    public $merchent_code;

    public function boot(PaymentMethodeRepositoryInterface $repository){


        $this->repository = $repository;
    }


    public function submit($FormData)
    {

        $validator = Validator::make($FormData, [
            'name' => 'required|string|max:30',
            'merchent_code' => 'nullable',
        ], [
            '*.required' => 'فیلد ضروری است.',
            '*.string' => 'فرمت اشتباه است !',
            '*.numeric' => 'کود باید به صورت عددی باشد',
            '*.max' => 'حداکثر تعداد کاراکترها : 30',
        ]);

        $validator->validate();
        $this->resetValidation();
        $this->repository->submit($FormData, $this->PaymentId);
        $this->reset();
        $this->dispatch('success', 'عملیات با موفقیت انجام شد!');

    }

    public function deleteConfirmation($id)
    {



        $this->delete_id = $id;

        $this->dispatch('deleteshow');
    }
    #[On('deleteconfirmated')]
    public function delete()
    {
     

        PaymentMethod::query()->where('id', $this->delete_id)->delete();
        $this->dispatch('success', 'عملیات حذف با موفقیت انجام شد!');
    }




    public function edit($PaymentId)
    {

        $delivery = PaymentMethod::query()->where('id', $PaymentId)->first();

        if ($delivery) {
            $this->name = $delivery->name;
            $this->merchent_code = $delivery->merchent_code;
            $this->PaymentId = $delivery->id;
        }

    }


    public function render()
    {
        $payments = PaymentMethod::query()->paginate(10);
        return view('livewire.admin.payment.index',[
            'payments'=>$payments
        ])->layout('layouts.admin.app');
    }
}
