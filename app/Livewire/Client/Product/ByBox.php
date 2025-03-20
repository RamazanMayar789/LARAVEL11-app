<?php

namespace App\Livewire\Client\Product;

use App\Models\Cart;
use App\Repositories\client\product\ClientProductRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ByBox extends Component
{

    public $price;
    public $discount;
    public $finalprice;

    public $sellerName;

    public $productId;

    public $incart=false;


    private $repository;

    public function boot(ClientProductRepositoryInterface $repository){

        $this->repository=$repository;
    }

    public function mount(){
        $this->incart=$this->repository->checkProductInCart($this->productId);
    }
    public function addToCart(){

      $this->repository->addToCart($this->productId);

        $this->incart=true;
        $this->dispatch('add-to-cart', ProductId:$this->productId);
    }
    public function render()
    {
        return view('livewire.client.product.by-box');
    }
}
