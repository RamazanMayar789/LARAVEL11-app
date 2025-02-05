<?php

namespace App\Livewire\Admin\Category;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use App\Models\CategoryFeature;
use App\Repositories\admin\CategoryRepositoriesInterface;
use Illuminate\Support\Facades\Validator;

class Features extends Component
{
    public $categoryName;
public $FeatureId;
public $name;
public $delete_id;
    public $categoryId;

    private $repository;

    public function boot(CategoryRepositoriesInterface $repository) {

        $this->repository = $repository;
    }
    public function mount(Category $category){
        $this->categoryName = $category->name;
        $this->categoryId=$category->id;
    }

     public function edit($categoryId)
    {


        $categoryfeature = CategoryFeature::query()->where('id', $categoryId)->first();

        if ($categoryfeature) {
            $this->name = $categoryfeature->name;
             $this->FeatureId=$categoryfeature->id;
            $this->categoryId=$categoryfeature->category_id;

        }

    }
    public function deleteConfirmation($id){

        $this->delete_id = $id;
        $this->dispatch('deleteshow');
    }
    #[On('deleteconfirmated')]
    public function deleteconfirmated(){

        $categoryfeature=CategoryFeature::query()->where('id', $this->delete_id)->first();
       if($categoryfeature->values()->exists()){
         $this->dispatch('warning', 'این دسته بندی دارای زیر شاخه نمی توان این دسته بندی را حذف کرد ');
      return;
        }
        $categoryfeature->delete();
        $this->dispatch('success', 'عملیات حذف با موفقیت انجام شد!');
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

        $this->repository->submitToCategoryFeature($FormData,$this->categoryId,$this->FeatureId);
     $this->reset('name');







        $this->dispatch('success', 'عملیات با موفقیت انجام شد!');



    }
    public function render()
    {
       $categoryFeature= CategoryFeature::query()->where('category_id',$this->categoryId)->paginate(10);
        return view('livewire.admin.category.features.index',[
            'categoryFeature'=>$categoryFeature
        ])->layout('layouts.admin.app');
    }
}
