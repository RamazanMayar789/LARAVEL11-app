<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\CategoryFeature;
use Illuminate\Support\Facades\Validator;

class Features extends Component
{

    use WithPagination;
public $categoryTittle;
public $name;
public $categoryId;
public $delete_id;
public $FeatureId;

 public function edit($featureId)
    {



        $categoryfeature = CategoryFeature::query()->where('id', $featureId)->first();

        if ($categoryfeature) {
            $this->name = $categoryfeature->name;
             $this->FeatureId=$categoryfeature->id;
            $this->categoryId=$categoryfeature->category_id;

        }

    }
    public function mount(Category $category){
        $this->categoryTittle=$category->name;
        $this->categoryId=$category->id;
    }
      public function submit($FormData  ,CategoryFeature $categoryFeature)
    {

        $validator = Validator::make($FormData, [
            'name' => 'required|string|max:30',

        ], [
            '*.required' => 'فیلد ضروری است.',
            '*.string' => 'فرمت اشتباه است !',
            '*.max' => 'حداکثر تعداد کاراکترها : 30',

        ]);

        $validator->validate();

        $categoryFeature->submit($FormData,$this->categoryId,$this->FeatureId);








        $this->dispatch('success', 'عملیات با موفقیت انجام شد!');

         $this->reset();


    }

    public function deleteConfirmation($id){

        $this->delete_id = $id;
        $this->dispatch('deleteshow');
    }
    #[On('deleteconfirmated')]
    public function deleteconfirmated(){

        $categoryfeature=CategoryFeature::query()->where('id', $this->delete_id)->first();
       if($categoryfeature->values()->exists()){
         $this->dispatch('warning', 'این ویژگی دارای دارای مقادیر است و  نمی توان این دسته بندی را حذف کرد ');
      return;
        }
        $categoryfeature->delete();
        $this->dispatch('success','عملیات حذف با موفقیت انجام شد!');

    }
    public function render()
    {
        $Features=CategoryFeature::query()->
        
        paginate(10);

        return view('livewire.admin.category.features.index',[
            'Features'=>$Features
        ])
        ->layout('layouts.admin.app');


    }
}
