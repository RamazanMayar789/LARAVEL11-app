<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use App\Repositories\admin\ProductRepositoriesInterface;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Content extends Component
{

    public $productName;
    Public $longDescription;
    Public $long_description;
    Public $short_description;
    public $productId;

private $repository;

public function boot(ProductRepositoriesInterface $repository){
    $this->repository=$repository;
}


    public function mount(Product $product){


        $this->productName=$product->name;
        $this->productId=$product->id;
        $this->longDescription=$product->long_description;
        $this->short_description=$product->short_description;
    }

    public function submit($FormData,Product $product){

        $FormData['long_description']=$this->longDescription;

        $validator=Validator::make($FormData,[
            'short_description'=>'required|string',
            'long_description'=>'required|string',


        ],
        [
            '*.required'=>'فیلد ضروری است',
            '*.string'=>'فرمت اشتباه است',



        ]);
    $validator->validate();


    $this->resetValidation();

    $this->repository->SubmitProductContent($FormData,$this->productId);
        $this->redirect(route('admin.product.index'));
        session()->flash('success', 'محصول با موفقیت افزود شد! ');

    }
    public function render()
    {
        return view('livewire.admin.product.content')->layout('layouts.admin.app');
    }
}
