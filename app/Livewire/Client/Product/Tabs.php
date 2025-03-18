<?php

namespace App\Livewire\Client\Product;

use App\Models\answer;
use App\Models\answerVote;
use App\Models\Product;
use App\Models\ProductFeatureValue;
use App\Models\ProductReview;
use App\Models\productReviewVote;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class Tabs extends Component
{

    public $afghanMonths;

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

            productReviewVote::query()->updateOrCreate(
                [
                    'user_id' => Auth::id(),
                    'product_reviews_id' => $ReviewId,
                ]
                ,
                [
                    'status' => $status
                ]
            );


            $this->getProductReview($this->productId);
        } else {

            return redirect()->route('client.auth.index');
        }

    }
    public function setVoteAnswer($status, $AnswerId)
    {

        if (Auth::check()) {

           answerVote::query()->updateOrCreate(
                [
                    'user_id' => Auth::id(),
                    'answer_id' => $AnswerId,
                ]
                ,
                [
                    'status' => $status
                ]
            );


            $this->getProductQA($this->productId);
        } else {

            return redirect()->route('client.auth.index');
        }

    }

    public function getProductFeatures($productId)
    {




        $this->productFeatures = ProductFeatureValue::query()
            ->with(['categoryFeature', 'categoryFeatureValue'])
            ->where('product_id', $productId)->get();

    }

    public function getProductQA($productId){

        $this->ProductQAs=Question::query()
        ->with('user')->where(['product_id'=>$productId,'status' => 'approved'])
        ->get();

        $this->productAnswer = answer::query()

            ->where([
                'product_id' => $productId,


            ])
            ->with('user', 'answerVotes')
            ->withCount([
                'answerVotes as likeCount' => function ($query) {
                    $query->where('status', 'like');
                },
                'answerVotes as dislikecount' => function ($query) {

                    $query->where('status', 'dislike');
                },

            ])->withExists([
                    'answerVotes as like' => function ($query) {
                        $query->where('status', 'like');
                    },

                    'answerVotes as dislike' => function ($query) {
                        $query->where('status', 'dislike');
                    },

                ])

            ->get();






    }
    public function getProductReview($productId)
    {

        $this->productReviews = ProductReview::query()

            ->where([
                'product_id' => $productId,
                'status' => 'approved',

            ])
            ->with('user', 'votes')
            ->withCount([
                'votes as likeCount' => function ($query) {
                    $query->where('status', 'like');
                },
                'votes as dislikecount' => function ($query) {

                    $query->where('status', 'dislike');
                },

            ])->withExists([
                    'votes as like' => function ($query) {
                        $query->where('status', 'like');
                    },

                    'votes as dislike' => function ($query) {
                        $query->where('status', 'dislike');
                    },

                ])

            ->get();





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

        Question::query()->create([

            'title' => $FormData['title'],

            'product_id' => $this->productId,
            'user_id' => Auth::id()
        ]);
        $this->reset( 'title');
        $this->submitsuccessalert = true;

    }

    public function render()
    {
        return view('livewire.client.product.tabs');
    }
}
