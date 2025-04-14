<?php

namespace App\Livewire\Client\Shipping;

use App\Models\Address;
use App\Models\City;
use App\Models\coupons;
use App\Models\DeliveryMethod;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{

    public $deliveries = [];
    public $AddressList = [];

    public $provinces = [];

    public $addressId;

    public $cities = [];

    public $address,$province,$city,$postalCode,$phone;


    //properties for invoice

public $totalProductCount,$totaloriginalPrice,$totaldiscountAmount,$totaldiscountPrice;


public $deliveryPrice;

// coupons

public $discountCodeAmount;
public $AmountTotal;
    public $values;

    public function mount()
    {

        if (Session::get('invoiceFromCart')) {

    $invoice=Session::get('invoiceFromCart');
    $this->totalProductCount=$invoice['totalProductCount'];
    $this->totaloriginalPrice=$invoice['totaloriginalPrice'];
    $this->totaldiscountAmount=$invoice['totaldiscountAmount'];
    $this->totaldiscountPrice=$invoice['totaldiscountPrice'];

        }


        $this->deliveries = DeliveryMethod::all();

$this->deliveryPrice=$this->deliveries->first()->price;

$this->totalAmount(
    $this->totaldiscountPrice,
$this->deliveryPrice,
$this->discountCodeAmount);





    }


    public function checkCodeDiscount($FormData){

       $validator= Validator::make($FormData,[
'code'=>'required|string|min:5|max:10|exists:coupons,code',
        ],[
            '*.required' => 'فیلد ضروری است',
            '*.string' => 'فارمت اشتباه است',
            '*.max' => 'حداکثر تعداد کراکتر :10',
            '*.min' => 'حداقل تعداد کراکتر :5',
            'code.exists' => 'کد تخفیف نا معتبر است',


        ]);

        $validator->validate();


        $code=coupons::where('code',$FormData['code'])->first();
$this->applyDiscount($code);

    }

    public function applyDiscount($code){

        if(!$code->is_active || (Carbon::parse($code->expire_at)->isPast())) {



            session()->flash('error', '  کد تخفیف نا معتبر است یا منقضی شده است  ');

return;



}


if(($this->AmountTotal < $code->main_purchase) || $code->limit<=0){



            session()->flash('error','شرایط استفاده از این کد تخفیف برقرار نیست !');


return;

    }


    $this->discountCodeAmount=$discount=$code->type=="percent" ? ($this->totaldiscountPrice * $code->value) : $code->value;
    $this->totalAmount($this->totaldiscountPrice,$this->deliveryPrice,$discount);

    session()->flash('success','کد تخفیف با موفقیت اعمال شد');



    }


    public function changeDelivery($deliveryId){
$this->deliveryPrice=DeliveryMethod::query()->where('id',$deliveryId)->first()->price;

        $this->totalAmount(
            $this->totaldiscountPrice,
            $this->deliveryPrice,
            $this->discountCodeAmount
        );

    }


    public function totalAmount($totaldiscountPrice,$deliveryPrice,$discountCodeAmount){

$this->AmountTotal=($totaldiscountPrice + $deliveryPrice)-$discountCodeAmount;
    }





    public function getprovince($type)
    {

        if ($type == 'add') {

            $this->reset();

        } else {
            $this->provinces = State::all();

        }






    }

    public function getCity($value)
    {

        $this->values = $value;
        $this->cities = City::query()->where('state_id', $this->values)->get();


    }

    public function submit($FormData)
    {



        $validator = Validator::make($FormData, [
            'address' => 'required|string|min:10|max:100',
            'province' => 'required|exists:states,id',
            'city' => 'required|exists:cities,id',

            'postalCode' => ['required', 'regex:/^[1-9][0-9]{9}$/'],
            'phone' => ['required', 'regex:/^07[0-9]{8}$/'],

        ], [
            '*.required' => 'فیلد ضروری است',
            '*.string' => 'فارمت اشتباه است',
            '*.max' => 'حداکثر تعداد کراکتر :100',
            '*.min' => 'حداقل تعداد کراکتر :10',
            'province.exists' => 'زون نا نعتبر است',
            'city.exists' => 'ولایت نا نعتبر است',
            'postalCode.regex' => 'کد پستی باید یک عدد 10 رقمی باشد که به صفر شروع نشود',
            'phone.regex' => 'شماره موبایل باید با 07 شروع شود و دقیقا  10 رقم باشد !',
        ]);

        $validator->validate();



        Address::updateOrCreate(
            [
                'id' => $this->addressId,

            ],
            [

                'mobile' => $FormData['phone'],
                'address' => $FormData['address'],
                'state_id' => $FormData['province'],
                'city_id' => $FormData['city'],
                'country_id' => 1,
                'user_id' => Auth::id(),

                'postal_code' => $FormData['postalCode'],
            ]
        );

        $this->dispatch('close-modaal');


    }

    public function editAddress($addressId)
    {
        $addressDeatil = Address::query()->where('id', $addressId)->first();
        $this->addressId = $addressId;
        if ($addressDeatil) {
            $this->address = $addressDeatil->address;

            $this->city = $addressDeatil->city_id;
            $this->province = $addressDeatil->state_id;
            $this->getCity($this->province);
            $this->getprovince('edit');
            $this->phone = $addressDeatil->mobile;
            $this->postalCode = $addressDeatil->postal_code;

        }

    }

    #[Layout('layouts.client.app-v2')]
    public function render()
    {
        $this->AddressList = Address::query()->where('user_id', Auth::id())->latest()->get();
        return view('livewire.client.shipping.index');
    }
}
