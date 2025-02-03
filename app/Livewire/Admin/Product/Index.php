<?php

namespace App\Livewire\Admin\Product;

use App\Models\Admin;
use App\Models\Product;
use App\Models\seoItem;
use Livewire\Component;
use Livewire\Attributes\On;


use App\Models\ProductImage;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\File;
use App\Repositories\admin\ProductRepositoriesInterface;
use app\Repositories\Admin\AdminProductRepositoriesInterface;

class Index extends Component
{
    use WithPagination;
    public $delete_id;
    private $repository;
    public function boot(ProductRepositoriesInterface $repository)
    {

        $this->repository = $repository;
    }

    public function deleteConfirmation(Product $product)
    {
        $this->delete_id = $product->id;


        $this->dispatch('deleteshow');
    }
    #[On('deleteconfirmated')]
    public function deleteconfirmated()
    {

        $productId = $this->delete_id;



    $this->repository->removeProduct($productId);
        $this->dispatch('success', 'عملیات حذف با موفقیت انجام شد!');


    }

    public function render()
    {
        $products = Product::query()->with('category', 'coverImage')->paginate(10);

        return view(
            'livewire.admin.product.index',
            [
                'products' => $products
            ]
        )->layout('layouts.admin.app');

    }
}
