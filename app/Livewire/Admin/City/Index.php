<?php

namespace App\Livewire\Admin\City;

use App\Models\City;
use App\Models\State;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Validator;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{

use WithPagination;
    public $name;
    public $cityId;
    public $stateId;
public $delete_id;
public $states=[];



public function mount(){
$this->states=State::all();

}
    public function submit($FormData  ,City $cities)
    {

        $validator = Validator::make($FormData, [
            'name' => 'required|string|max:30',
             'stateId' => 'required|exists:states,id',
        ], [
            '*.required' => 'فیلد ضروری است.',
            '*.string' => 'فرمت اشتباه است !',
            '*.max' => 'حداکثر تعداد کاراکترها : 30',
            'stateId.exists' => 'زون نامعتبر است '
        ]);

        $validator->validate();

        $cities->submit($FormData,$this->cityId);
        $this->reset();
        $this->dispatch('success', 'عملیات با موفقیت انجام شد!');

    }
    public function deleteConfirmation($id){

        $this->delete_id = $id;
        $this->dispatch('deleteshow');
    }
    #[On('deleteconfirmated')]
    public function deleteconfirmated(){
        City::query()->where('id', $this->delete_id)->delete();
        $this->dispatch('success', 'عملیات حذف با موفقیت انجام شد!');
    }




    public function edit($cityId)
    {

        $city = City::query()->where('id', $cityId)->first();

        if ($city) {
            $this->name = $city->name;
            $this->stateId = $city->state_id;
            $this->cityId=$city->id;
        }

    }


    public function delete($country_id)
    {

        City::query()->where('id', $country_id)->delete();
        $this->dispatch('success', 'عملیات حذف با موفقیت انجام شد!');


    }

    public function render()
    {
     $cities = City::query()->paginate(10);
        return view('livewire.admin.city.index', [
            'cities' => $cities
        ])->layout('layouts.admin.app');
    }
}
