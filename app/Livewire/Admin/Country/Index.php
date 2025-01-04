<?php

namespace App\Livewire\Admin\Country;

use App\Models\Country;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class Index extends Component
{
public $name;

    public function submit($FormData, Country $country){

        $validator = Validator::make($FormData, [
            "name"=> "required|string|max:30|min:3",
    ],
    [
        '*.required'=> 'لطفا نام کشور وارد کنید',
        '*.string'=>'فرمت نام کشور نامتعبر است',
        '*.max'=>'

        حداکثر تعداد کاراکترها
:30
        ',
        '*.min'=>'
                    حداقل کاراکتر ها
:3        '
    ]);

    $validator->validate();
$country->submit($FormData);
$this->reset();
$this->dispatch('success','عملیات افزودن موفقانه انجام شد!');



}


    public function render()
    {
        $countries = Country::all();
        return view('livewire.admin.country.index',[
            'countries'=>$countries
        ])->layout('layouts.admin.app');
    }
}
