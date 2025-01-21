<?php

namespace App\Livewire\Admin\Product;

use App\Models\Seller;
use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;


class Create extends Component
{
    use WithFileUploads;
    public $productId, $name,$meta_title,$meta_description,$price,$discount,$stock,$featured,$slug,$discount_duration,$sellerId;
public $categories=[];
    public $sellers=[];
    #[Validate(['photos.*'=>'photo.|max:1024'])]
       public $photos=[];
    public function mount(){
$this->categories = Category::all();

$this->sellers = Seller::query()->select('id','shop_name')->get();

    }

    public function updatedName(){

            $this->slug=Str::slug($this->name,'-',null);

    }
     public function submit($FormData , Product $product)
    {


         $FormData['featured']=false;
         if(isset($FormData['featured'])){
            $FormData['featured']=true;
         }else{
            $FormData['featured']=false;
         }

         $FormData['photos']=$this->photos;

        //  foreach($this->photos as $photo){
        //     $photo->store('photos');
        //  }

       $validator = Validator::make($FormData, [
            'photos.*'=>'nullable|image:mimes:jpg,png,jpeg,gif,webp',
            'name' => 'required|string|max:200',
            'slug' => 'required|string',
            'meta_title' => 'required|string',
            'meta_description' => 'required|string',
            'price' => 'required|integer',
            'discount' => 'nullable|integer',
             'stock' => 'required|integer',
            'featured' => 'nullable|boolean',
            'sellerId' => 'required|exists:sellers,id',
            'categoryId' => 'required|exists:categories,id'
             ], [
            '*.required' => 'فیلد ضروری است.',
            '*.integer' => 'این فیلد باید از نوع عددی باشد',
            '*.string' => 'فرمت اشتباه است !',
            '*.min' => 'حداکثر تعداد کاراکترها :50',
            'categoryId.exists' => 'دسته بندی  نامعتبر است ',
            'sellerId.exists' => 'فروشگاه  نامعتبر است ',
            'photos.*'=>'فرمت نامعتبر است'
        ]);

        $validator->validate();


        $product->submit($FormData,$this->productId,$this->photos);

        $this->dispatch('success', 'عملیات با موفقیت انجام شد!');
        $this->reset();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.admin.product.create.index')->layout('layouts.admin.app');
    }
}
