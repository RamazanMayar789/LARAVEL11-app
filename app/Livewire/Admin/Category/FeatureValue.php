<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;

use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\CategoryFeature;
use Illuminate\Support\Facades\Validator;

class FeatureValue extends Component
{
     public $featureId;
     public $featureName;
    use WithPagination;
    public $valueId;
    public $value;
    public $delete_id;
    public $categoryId;

    public function mount(CategoryFeature $categoryFeature){

        $this->featureName=$categoryFeature->name;
        $this->featureId=$categoryFeature->id;


    }
     public function submit($FormData  ,\App\Models\featureValue $featureValue)
    {


        $validator = Validator::make($FormData, [
            'value' => 'required|string|max:30',

        ], [
            '*.required' => 'فیلد ضروری است.',
            '*.string' => 'فرمت اشتباه است !',
            '*.max' => 'حداکثر تعداد کاراکترها : 30',

        ]);

        $validator->validate();

        $featureValue->submit($FormData,$this->featureId, $this->valueId);
     $this->reset('value');







        $this->dispatch('success', 'عملیات با موفقیت انجام شد!');



    }
     public function deleteConfirmation($id){

        $this->delete_id = $id;
        $this->dispatch('deleteshow');
    }
    #[On('deleteconfirmated')]
    public function deleteconfirmated(){

        $categoryfeaturevalue=\App\Models\featureValue::query()->where('id', $this->delete_id)->first();

        $categoryfeaturevalue->delete();
        $this->dispatch('success', 'عملیات حذف با موفقیت انجام شد!');
    }

    public function edit($value_Id)
    {


        $categoryfeaturevalue = \App\Models\featureValue::query()->where('id', $value_Id)->first();

        if ($categoryfeaturevalue) {
            $this->value = $categoryfeaturevalue->value;
             $this->valueId=$categoryfeaturevalue->id;
            $this->categoryId=$categoryfeaturevalue->category_feature_id;

        }

    }

    public function render()
    {

         $featureValue= \App\Models\featureValue::query()->where('category_feature_id',$this->featureId)->paginate(10);
        return view('livewire.admin.category.feature-value.index',[
            'featureValue'=>$featureValue
        ])->layout('layouts.admin.app');
    }
}
