<?php

namespace App\Livewire\Client\Product;

use App\Models\Product;
use App\Models\ProductFeatureValue;
use App\Models\ProductReview;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class Tabs extends Component
{

    public $afghanMonths;

    public $sellerName;

    public $productId;


    public $InputPositive = '';

    public $InputNegative = '';
    public $positiveItems = [];
    public $name;
    public $NegativeItems = [];

    public $submitsuccessalert = false;

    public $productFeatures = [];

    public $productReviews=[];
    public $shortDescription;
    public $longDescription;

    public $title;
    public $comment;

    public $activeTab = 0;




    public function mount()
    {

        App()->setLocale('fa');





        $this->changeTab(1);








    }






    public function changeTab($tabNumber)
    {

        $this->activeTab = $tabNumber;
        $product = Product::query()->where('id', $this->productId);

        if ($tabNumber == 1) {
            $this->shortDescription = $product->pluck('short_description')->first();

        } elseif ($tabNumber == 2) {
            $this->longDescription = $product->pluck('long_description')->first();
        } elseif ($tabNumber == 3) {
            $this->getProductFeatures($this->productId);

        } elseif ($tabNumber == 4) {
            $this->getProductReview($this->productId);
        }
    }

    public function getProductFeatures($productId)
    {


        $this->productFeatures = ProductFeatureValue::query()
            ->with(['categoryFeature', 'categoryFeatureValue'])
            ->where('product_id', $productId)->get();

    }
    public function getProductReview($productId)
    {

       $this->productReviews=ProductReview::query()->where([
        'product_id'=>$productId,
        'status'=>'approved'
       ])->get();




    }




    public function submit($FormData)
    {




        $validator = Validator::make($FormData, [
            'title' => 'required|string|max:100|min:10',
            'comment' => 'required|string|max:100|min:10'

        ], [
            '*.required' => 'فیلد ضروری است.',
            '*.string' => 'فرمت اشتباه است !',
            '*.max' => 'حداکثر تعداد کاراکترها : 100',
            '*.min' => '  حداقل باید 10 کراکتر باشد'


        ]);

        $validator->validate();
        $this->resetValidation();

        ProductReview::query()->create([

            'title' => $FormData['title'],
            'comment' => $FormData['comment'],
            'positive' => implode(',', $this->positiveItems),
            'negative' => implode(',', $this->NegativeItems),
            'product_id' => $this->productId,
            'user_id' => Auth::id()
        ]);
        $this->reset('comment', 'title', 'InputNegative', 'InputPositive');
        $this->submitsuccessalert = true;



    }


    public function addPositiveItem()
    {
        $this->validate([
            'InputPositive' => 'required|min:3|max:50'
        ], [
            'InputPositive.required' => 'فیلد الزامی است',
            'InputPositive.min' => '  حداقل باید 3 کراکتر باشد',
            'InputPositive.max' => '  حداکثر باید 50 کراکتر باشد',
        ]);

        $this->positiveItems[] = $this->InputPositive;
        $this->InputPositive = '';

    }
    public function addNegativeItem()
    {
        $this->validate([
            'InputNegative' => 'required|min:3|max:50'
        ], [
            'InputNegative.required' => 'فیلد الزامی است',
            'InputNegative.min' => '  حداقل باید 3 کراکتر باشد',
            'InputNegative.max' => '  حداکثر باید 3 کراکتر باشد',
        ]);

        $this->NegativeItems[] = $this->InputNegative;
        $this->InputNegative = '';


    }

    public function removeNegativeItem($index)
    {

        array_splice($this->NegativeItems, $index, 1);


    }
    public function removepositive($index)
    {

        array_splice($this->positiveItems, $index, 1);


    }

    public function render()
    {
        return view('livewire.client.product.tabs');
    }
}
