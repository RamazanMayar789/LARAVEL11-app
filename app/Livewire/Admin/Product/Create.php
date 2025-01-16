<?php

namespace App\Livewire\Admin\Product;

use App\Models\Seller;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class Create extends Component
{
    public $name;
    public $slug;
    public $categories=[];
    public $sellers=[];
    public function mount(){
$this->categories = Category::all();

$this->sellers = Seller::all();

    }
    public function updatedName(){

            $this->slug=Str::slug($this->name,'-',null);

    }
    public function render()
    {
        return view('livewire.admin.product.create')->layout('layouts.admin.app');
    }
}
