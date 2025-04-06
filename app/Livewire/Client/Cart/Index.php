<?php

namespace App\Livewire\Client\Cart;

use App\Models\Cart;
use App\Repositories\client\cart\ClientCartRepositoryInterface as CartClientCartRepositoryInterface;
use ClientCartRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{

    public $cartItems=[];
    public $invoice=[];

    public $outOfstock=false;


private $repository;


public function boot(CartClientCartRepositoryInterface $repository){

    $this->repository=$repository;
}

    public function updateCartQuantity($itemId,$action){
      $this->outOfstock=$this->repository->updateCartQuantity($itemId,$action);

    }


    #[Layout('layouts.client.app-v2')]

    public function render()
    {
       $data=$this->repository->getCartItemWithCalucaltion();

       $this->cartItems=$data['cartItems'];
       $this->invoice=$data['invoice'];



        return view('livewire.client.cart.index');
    }
}
