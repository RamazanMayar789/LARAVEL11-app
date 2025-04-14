<?php

namespace App\Livewire\Admin\Discount;

use App\Models\coupons;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    public $code;
    public $type = 'fixed';
    public $value;
    public $limit;
    public $main_purchase;
    public $expire_at;
    public $is_active = false;
    use WithPagination;










    public function submit($FormData)
    {
        $validator = Validator::make($FormData, [
            'code' => 'required|string|unique:coupons,code',
            'type' => 'required|in:fixed,percent',
            'value' => 'required|integer',
            'limit' => 'required|integer',
            'main_purchase' => 'required|integer',
            'expire_at' => 'required|date',


        ],[
            '*.required' => 'فیلد ضروری است.',
            '*.string' => 'فرمت اشتباه است !',
            '*.integer' => 'فقط عدد صحیح مجاز است !',
            '*.numeric' => 'فقط عدد مجاز است !',
            'code.unique' => 'کد تخفیف تکراری است !',
            'expire_at.date' => 'تاریخ نامعتبر است !',

        ]);

        $validator->validate();


        if ($FormData['value'] > $FormData['main_purchase']) {
            // اضافه کردن خطا
            $this->addError('value', 'مقدار تخفیف باید کمتر از حداقل خرید باشد.');
            return;
        }
    }





    public function render()
    {

        $discountcode = coupons::query()->paginate(10);

        return view('livewire.admin.discount.index', [
            'discountcode' => $discountcode,

        ])->layout('layouts.admin.app');
        ;
    }
}
