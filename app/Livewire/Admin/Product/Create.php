<?php

namespace App\Livewire\Admin\Product;


use session;
use App\Models\Seller;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Repositories\admin\ProductRepositoriesInterface;
use app\Repositories\admin\AdminProductRepositoriesInterface;


class Create extends Component
{
    use WithFileUploads;
    public $productId, $product, $name, $slug, $sellerId;
    public $categories = [];
    public $productImages = [];
    public $images=[];

    public $coverIndex=0;
    public $sellers = [];
    #[Validate(['photos.*' => 'photo.|max:1024'])]
    public $photos = [];
    private $repository;
    public function boot(ProductRepositoriesInterface $repository){

        $this->repository = $repository;
    }
    public function mount()
    {

        if ($_GET and $_GET['p_id']) {
            $this->productId = $_GET['p_id'];
            $products = $this->product = Product::query()
            ->with('seoItems','images')->where('id', $this->productId)->firstOrFail();
            $this->name = $products->name;
            $this->slug = $products->seoItems->slug;

        }



        $this->categories = Category::all();
        $this->productImages=ProductImage::all();

        $this->sellers = Seller::query()->select('id', 'shop_name')->get();

    }

    public function updatedName()
    {

        $this->slug = Str::slug($this->name, '-', null);

    }
    public function submit($FormData, Product $product)
    {


        $FormData['featured'] = false;
        if (isset($FormData['featured'])) {
            $FormData['featured'] = true;
        } else {
            $FormData['featured'] = false;
        }

        if ($FormData['discount_duration'] == "") {
            $FormData['discount_duration'];

        }

        if (!isset($FormData['sellerId'])) {
            $FormData['sellerId'] = null;

        }


        $FormData['photos'] = $this->photos;
        $FormData['coverIndex'] = $this->coverIndex;



        //  foreach($this->photos as $photo){
        //     $photo->store('photos');
        //  }

        $validator = Validator::make($FormData, [
            'photos.*' => 'nullable|image:mimes:jpg,png,jpeg,gif,webp',
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
            'coverIndex.required' => 'لطفا یک تصویر شاخص انتخاب کنید !',
            '*.required' => 'فیلد ضروری است.',
            '*.integer' => 'این فیلد باید از نوع عددی باشد',
            '*.string' => 'فرمت اشتباه است !',
            '*.min' => 'حداکثر تعداد کاراکترها :50',
            'categoryId.exists' => 'دسته بندی  نامعتبر است ',
            'sellerId.exists' => 'فروشگاه  نامعتبر است ',
            'photos.*' => 'فرمت نامعتبر است'
        ]);

        $validator->validate();


        $this->repository->submit($FormData, $this->productId, $this->photos, $this->coverIndex);
        $this->redirect(route('admin.product.index'));
        session()->flash('success', 'محصول با موفقیت افزود شد!');

    }

    public function setCoverImage($index)
    {


        $this->coverIndex=$index;

    }


    public function removePhoto($index)
    {
        if ($index == $this->coverIndex) {
            $this->coverIndex = null;
        }
        array_splice($this->photos, $index, 1);
    }

    public function removeOldPhoto(productImage $productImage, $productId)
    {

       $this->repository->removeOldPhoto($productImage, $productId);

    }

    public function setCoverOldImage($photoId,$productId)
    {




      $this->repository->setCoverOldImage($photoId,$productId);
        $this->dispatch('success','تصویر کاور با موفقیت تبدیل شد');
    }


    public function render()
    {
        return view('livewire.admin.product.create.index')->layout('layouts.admin.app');
    }
}
