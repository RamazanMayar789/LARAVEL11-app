<?php

namespace App\Livewire\Admin\State;

use App\Models\State;
use App\Models\Country;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;

class Index extends Component
{
    public $name;
    public $delete_id;
    public $stateId;
    public $countryId;
    use WithPagination;
public $countries=[];
    public function mount() {
       $this->countries= Country::all();

    }
    public function submit($FormData  ,State $states)
    {

        $validator = Validator::make($FormData, [
            'name' => 'required|string|max:30',
            'countryId' => 'required|exists:countries,id',
        ], [
            '*.required' => 'فیلد ضروری است.',
            '*.string' => 'فرمت اشتباه است !',
            'countryId.exists' => 'کشور نامعتبر است ',
        ]);

        $validator->validate();

        $states->submit($FormData,$this->stateId);
        $this->reset();
        $this->dispatch('success', 'عملیات با موفقیت انجام شد!');

    }
        public function deleteConfirmation($id){

        $this->delete_id = $id;
        $this->dispatch('deleteshow');
    }
    #[On('deleteconfirmated')]
    public function deleteconfirmated(){
        State::query()->where('id', $this->delete_id)->delete();
        $this->dispatch('success', 'عملیات حذف با موفقیت انجام شد!');
    }




    public function edit($state_id)
    {

        $state = State::query()->where('id', $state_id)->first();

        if ($state) {
            $this->name = $state->name;
            $this->stateId = $state->id;
            $this->countryId=$state->country_id;
        }

    }


   
    public function render()
    {

        $states=State::query()->paginate(10);
        return view('livewire.admin.state.index',
        [
            'states'=>$states
            ])->layout('layouts.admin.app');
    }
}
