<?php

namespace App\Livewire\Client\Product;

use App\Models\answer;
use App\Models\answerVote;
use App\Models\Product;
use App\Models\ProductFeatureValue;
use App\Models\ProductReview;
use App\Models\productReviewVote;
use App\Models\Question;
use App\Repositories\client\product\ClientProductRepositoryInterface as ProductClientProductRepositoryInterface;
use ClientProductRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class Tabs extends Component
{

    public $afghanMonths;

    public $count;

    public $body;

    public $sellerName;

    public $productId;


    public $InputPositive = '';

    public $InputNegative = '';
    public $positiveItems = [];

    public $productAnswer=[];


    public $name;
    public $NegativeItems = [];

    public $submitsuccessalert = false;
    public $submitsuccessquestionalert = false;

    public $productFeatures = [];

    public $productReviews = [];
    public $shortDescription;
    public $longDescription;

    public $title;
    public $comment;
    public $ProductQAs = [];
    public $activeTab = 0;


private $repository;

    public function boot(ProductClientProductRepositoryInterface $repository)
    {

        $this->repository = $repository;
    }

    public function mount()
    {

        App()->setLocale('fa');

        $this->getProductReview($this->productId);


        $this->getProductQA($this->productId);
        $this->changeTab(1);








    }




public function submitANswer($FormData){





        $validator = Validator::make($FormData, [
            "body" => 'required|string|max:100|min:9',
            'questionId' => 'exists:questions,id',


        ], [
            '*.required' => 'فیلد ضروری است.',
            '*.string' => 'فرمت اشتباه است !',
            '*.max' => 'حداکثر تعداد کاراکترها : 100',
            '*.min' => '  حداقل باید 10 کراکتر باشد',
           'questionId.exists' => '  دسته بندی نامعتبر است'


        ]);
        $validator->validate();
$this->resetValidation();


        answer::query()->create([

            'body' => $FormData['body'],
            'question_id'=>$FormData['questionId'],

            'product_id' => $this->productId,
            'user_id' => Auth::id()
        ]);

        $this->submitsuccessquestionalert = true;



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

        } elseif ($tabNumber == 5) {
            $this->getProductQA($this->productId);
        }
    }

    public function getAfghanDateProperty()
    {
        $afghanMonths = [
            'فروردین' => 'حمل',
            'اردیبهشت' => 'ثور',
            'خرداد' => 'جوزا',
            'تیر' => 'سرطان',
            'مرداد' => 'اسد',
            'شهریور' => 'سنبله',
            'مهر' => 'میزان',
            'آبان' => 'عقرب',
            'آذر' => 'قوس',
            'دی' => 'جدی',
            'بهمن' => 'دلو',
            'اسفند' => 'حوت',
        ];

        // دریافت تاریخ امروز
        $verta = new Verta(); // مقدار پیش‌فرض تاریخ امروز است
        $persianDate = $verta->format('j F Y'); // خروجی: 17 اسفند 1402

        // جایگزینی ماه ایرانی با ماه افغانی
        $afghanDate = str_replace(array_keys($afghanMonths), array_values($afghanMonths), $persianDate);

        return $afghanDate; // خروجی: 17 حوت 1402
    }


    public function setVote($status, $ReviewId)
    {

        if (Auth::check()) {

           $this->repository->setVote($status,$ReviewId);


            $this->getProductReview($this->productId);
        } else {

            return redirect()->route('client.auth.index');
        }

    }
    public function setVoteAnswer($status, $AnswerId)
    {

        if (Auth::check()) {

          $this->repository->setVoteAnswer($status,$AnswerId);


            $this->getProductQA($this->productId);
        } else {

            return redirect()->route('client.auth.index');
        }

    }

    public function getProductFeatures($productId)
    {




        $this->productFeatures = $this->repository->getProductFeatures($productId);

    }

    public function getProductQA($productId){

        $this->ProductQAs=$this->repository->getProductQA($productId);

        $this->count =$this->repository->countqa();

        $this->productAnswer = $this->repository->answer($productId);






    }
    public function getProductReview($productId)
    {

        $this->productReviews = $this->repository->getProductReview($productId);


    }




    public function addItem($type)
    {

        $inputFiled = $type === 'positive' ? 'InputPositive' : 'InputNegative';
        $itemFiled = $type === 'positive' ? 'positiveItems' : 'NegativeItems';


        $this->validate([
            $inputFiled => 'required|min:3|max:50'
        ], [
            $inputFiled . '.required' => 'فیلد الزامی است',
            $inputFiled . '.min' => '  حداقل باید 3 کراکتر باشد',
            $inputFiled . '.max' => '  حداکثر باید 50 کراکتر باشد',
        ]);

        $this->{$itemFiled}[] = $this->{$inputFiled};
        $this->{$inputFiled} = '';
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

      $this->repository->submitProductReviews($FormData,$this->productId,
      $this->positiveItems,$this->NegativeItems);
        $this->reset('comment', 'title', 'InputNegative', 'InputPositive');
        $this->submitsuccessalert = true;



    }


    // public function addPositiveItem()
    // {
    //     $this->validate([
    //         'InputPositive' => 'required|min:3|max:50'
    //     ], [
    //         'InputPositive.required' => 'فیلد الزامی است',
    //         'InputPositive.min' => '  حداقل باید 3 کراکتر باشد',
    //         'InputPositive.max' => '  حداکثر باید 50 کراکتر باشد',
    //     ]);

    //     $this->positiveItems[] = $this->InputPositive;
    //     $this->InputPositive = '';

    // }
    // public function addNegativeItem()
    // {
    //     $this->validate([
    //         'InputNegative' => 'required|min:3|max:50'
    //     ], [
    //         'InputNegative.required' => 'فیلد الزامی است',
    //         'InputNegative.min' => '  حداقل باید 3 کراکتر باشد',
    //         'InputNegative.max' => '  حداکثر باید 3 کراکتر باشد',
    //     ]);

    //     $this->NegativeItems[] = $this->InputNegative;
    //     $this->InputNegative = '';


    // }

    public function removeNegativeItem($index)
    {

        array_splice($this->NegativeItems, $index, 1);


    }
    public function removepositive($index)
    {

        array_splice($this->positiveItems, $index, 1);


    }

    public function removeItem($type, $index)
    {
        $itemFiled = $type === 'positive' ? 'positiveItems' : 'NegativeItems';
        array_splice($this->{$itemFiled}, $index, 1);
    }


    public function submitQuestion($FormData)
    {

           $validator = Validator::make($FormData, [
            "title" => 'required|string|max:100|min:9',


        ], [
            '*.required' => 'فیلد ضروری است.',
            '*.string' => 'فرمت اشتباه است !',
            '*.max' => 'حداکثر تعداد کاراکترها : 100',
            '*.min' => '  حداقل باید 10 کراکتر باشد'


        ]);
        $validator->validate();
        $this->resetValidation();
$this->repository->submitQuestion($FormData,$this->productId);

        $this->reset( 'title');
        $this->submitsuccessalert = true;

    }

    public function render()
    {
        return view('livewire.client.product.tabs');
    }
}
