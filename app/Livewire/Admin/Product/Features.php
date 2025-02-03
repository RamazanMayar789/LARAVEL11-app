<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\CategoryFeature;
use App\Models\featureValue;
use App\Models\Product;
use App\Models\ProductFeatureValue;
use App\Repositories\admin\ProductRepositoriesInterface;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Features extends Component
{

    public $features=[];
    public $productId;
    private $repository;

    public function boot(ProductRepositoriesInterface $repository){

        $this->repository = $repository;
    }
    public function mount(Product $product){
      $categoryId= $product->category_id;
      $this->productId= $product->id;
    $this->features=CategoryFeature::query()->where('category_id',$categoryId)->get();

    }

    public function submit($FormData)
    {

        $featureIds = [];
        $featureValueIds = [];


        foreach ($FormData as $value) {

            list($featureId, $featureValueId) = explode('_', $value);
            $featureIds[] = $featureId;

            $featureValueIds[] = $featureValueId;

        }

        $data = [
            'feature_ids' => $featureIds,
            'feature_value_ids' => $featureValueIds
        ];


        $validator = Validator::make($data, [
            'feature_ids' => 'required|array',
            'feature_ids.*' => 'required|exists:category_features,id',
            'feature_value_ids' => 'required|array',
            'feature_value_ids.*' => 'required|exists:feature_values,id'
        ], [
            '*.required' => 'فیلد اجباری',
            '*.array' => 'نوع اطلاعات باید آرایه باشد',
            'feature_ids.*.exists' => 'وِیژگی نامعتبر است!',
            'feature_value_ids.*.exists' => 'مقادیر وِیژگی نامعتبر است!'

        ]);
        $validator->validate();
   $this->resetValidation();
        $this->repository->submitProductFeatures($FormData,$this->productId);

        $this->redirect(route('admin.product.index'));
        session()->flash('success', 'عملیات ثبت ویژگی با موفقیت انجام شد !');


    }

    public function render()
    {
        return view('livewire.admin.product.features')->layout('layouts.admin.app');
    }
}
