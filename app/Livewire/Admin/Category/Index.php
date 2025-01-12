<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;

use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;

class Index extends Component
{
    use WithPagination;
    public $categories=[];
    public $name;
    public $updateCategory=[];

    public $delete_id;
    public $parentId;
    public $categoryId;



 public function deleteConfirmation($id){

        $this->delete_id = $id;
        $this->dispatch('deleteshow');
    }
    #[On('deleteconfirmated')]
    public function deleteconfirmated(){

        $categories=Category::query()->where('id', $this->delete_id)->first();
       if($categories->children()->exists()){
         $this->dispatch('warning', 'این دسته بندی دارای زیر شاخه نمی توان این دسته بندی را حذف کرد ');
      return;
        }
        $categories->delete();
        $this->dispatch('success', 'عملیات حذف با موفقیت انجام شد!');
    }
    public function edit($categoryId)
    {


        $category = Category::query()->where('id', $categoryId)->first();

        if ($category) {
            $this->name = $category->name;
             $this->categoryId=$category->id;
            $this->parentId=$category->category_id;

        }

    }

    public function mount(){
        $this->updateCategory=Category::all();

    }



    public function submit($FormData  ,Category $category)
    {

        $validator = Validator::make($FormData, [
            'name' => 'required|string|max:30',
             'parentId' => 'nullable|exists:categories,id',
        ], [
            '*.required' => 'فیلد ضروری است.',
            '*.string' => 'فرمت اشتباه است !',
            '*.max' => 'حداکثر تعداد کاراکترها : 30',
            'parentId.exists' => '  دسته بندی نامعتبر است '
        ]);

        $validator->validate();

        $category->submit($FormData,$this->categoryId);
     $this->reset('name');







        $this->dispatch('success', 'عملیات با موفقیت انجام شد!');

         // Dispatch the event to update categories
                    $this->mount();

    }





    public function render()
    {

        $categories=Category::query()->paginate(10);
        return view('livewire.admin.category.index',[
            'allCategories' => $categories,
            'updateCategory' => $this->updateCategory
        ])->layout('layouts.admin.app');
    }
}
