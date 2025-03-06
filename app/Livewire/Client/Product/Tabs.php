<?php

namespace App\Livewire\Client\Product;

use App\Models\Product;
use Livewire\Component;

class Tabs extends Component
{

    public $productId;
public $shortDescription;
public $longDescription;

public $activeTab=0;

public function mount(){
    $this->changeTab(1);
}
    public function changeTab($tabNumber){

        $this->activeTab=$tabNumber;
       $product= Product::query()->where('id',$this->productId);

        if($tabNumber==1){
$this->shortDescription=$product->pluck('short_description')->first();

        }elseif($tabNumber==2){
            $this->longDescription = $product->pluck('long_description')->first();
        }elseif($tabNumber==3){

        }
    }
    public function render()
    {
        return view('livewire.client.product.tabs');
    }
}
