<?php

namespace App\Livewire\Admin\Country;

use App\Models\Country;
use App\Repositories\admin\CountryRepositoryInterface;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\On;

class Index extends Component
{
   use WithPagination;

    public $name;
    public $countryId;
public $delete_id;



private $repository;


public function boot(CountryRepositoryInterface $repository){

    $this->repository = $repository;
}

    public function submit($FormData  ,Country $country)
    {

        $validator = Validator::make($FormData, [
            'name' => 'required|string|max:30',
        ], [
            '*.required' => 'فیلد ضروری است.',
            '*.string' => 'فرمت اشتباه است !',
            '*.max' => 'حداکثر تعداد کاراکترها : 30',
        ]);

        $validator->validate();

        $this->repository->submit($FormData,$this->countryId);
        $this->reset('name');
        $this->dispatch('success', 'عملیات با موفقیت انجام شد!');

    }
    public function deleteConfirmation($id){

        $this->delete_id = $id;
        $this->dispatch('deleteshow');
    }
    #[On('deleteconfirmated')]
    public function deleteconfirmated(){
        Country::query()->where('id', $this->delete_id)->delete();
        $this->dispatch('success', 'عملیات حذف با موفقیت انجام شد!');
    }




    public function edit($country_id)
    {
        $country = Country::query()->where('id', $country_id)->first();

        if ($country) {
            $this->name = $country->name;
            $this->countryId = $country->id;
        }

    }


    public function delete($country_id)
    {

        Country::query()->where('id', $country_id)->delete();
        $this->dispatch('success', 'عملیات حذف با موفقیت انجام شد!');


    }


    public function render()
    {
        $countries = Country::query()->paginate(10);
        return view('livewire.admin.country.index', [
            'countries' => $countries
        ])->layout('layouts.admin.app');
    }
}
