<?php

namespace App\Livewire\Admin\Product;

use session;
use App\Models\Seller;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Validator;


class Create extends Component
{
    use WithFileUploads;
    public $productId, $name,$meta_title,$meta_description,$price,$discount,$stock,$featured,$slug,$discount_duration,$sellerId;
public $categories=[];

public $coverIndex=0;
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

         if($FormData['discount_duration']==""){
            $FormData['discount_duration'];

         }

        if (!isset($FormData['sellerId'])) {
            $FormData['sellerId']=null;

        }

         $FormData['photos']=$this->photos;
         $FormData['coverIndex']=$this->coverIndex;

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
            'sellerId' => 'nullable|exists:sellers,id',
            'categoryId' => 'required|exists:categories,id',
            'coverIndex' => 'required'
             ], [
            'coverIndex.required'=>'لطفا یک تصویر شاخص انتخاب کنید !',
            '*.required' => 'فیلد ضروری است.',
            '*.integer' => 'این فیلد باید از نوع عددی باشد',
            '*.string' => 'فرمت اشتباه است !',
            '*.min' => 'حداکثر تعداد کاراکترها :50',
            'categoryId.exists' => 'دسته بندی  نامعتبر است ',
            'sellerId.exists' => 'فروشگاه  نامعتبر است ',
            'photos.*'=>'فرمت نامعتبر است'
        ]);

        $validator->validate();


        $product->submit($FormData,$this->productId,$this->photos,$this->coverIndex);
        $this->redirect(route('admin.product.index'));
        session()->flash('success', 'محصول با موفقیت افزود شد!');

    }

    public function setCoverImage($index){
        $this->coverIndex=$index;
    }
    public function removePhoto($index){
        if($index==$this->coverIndex){
            $this->coverIndex=null;
        }
        array_splice($this->photos,$index,1);
    }

    public function render()
    {
        return view('livewire.admin.product.create.index')->layout('layouts.admin.app');
    }
}
