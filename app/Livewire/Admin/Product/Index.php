<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\seoItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class Index extends Component
{
    use WithPagination;
    public $delete_id;
    public function deleteConfirmation(Product $product)
    {
        $this->delete_id = $product;

        $this->dispatch('deleteshow');
    }
    #[On('deleteconfirmated')]
    public function deleteconfirmated()
    {

        $product = $this->delete_id;

        $product->removeProduct($product);

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
