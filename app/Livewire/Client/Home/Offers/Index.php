<?php

namespace App\Livewire\Client\Home\Offers;

use Carbon\Carbon;
use App\Models\Product;
use Livewire\Component;

use App\Repositories\client\first_page\first_pageRepositoryInterface;
class Index extends Component
{

    private $repository;



    public function boot(first_pageRepositoryInterface $repository){

$this->repository=$repository;
    }

    public $featureProduct = [];

    public function mount()
    {

        $this->featureProduct=$this->repository->getFeaturesProducts();


    }

    public function placeholder()
    {

        return view('Layouts.client.Placeholder.First-page.offers-Skeleton');
    }

    public function render()
    {
        return view('livewire.client.home.offers.index');
    }
}
