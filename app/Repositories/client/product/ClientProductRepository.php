<?php


namespace App\Repositories\client\product;

use App\Models\answer;
use App\Models\answerVote;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductFeatureValue;
use App\Models\ProductReview;
use App\Models\productReviewVote;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Hekmatinasser\Verta\Verta;

class ClientProductRepository implements ClientProductRepositoryInterface
{
    public function getSingleProduct($p_code){

     return Product::query()
            ->where('p_code', $p_code)
            ->select(
                'id',
                'name',
                'price',
                'discount',
                'discount_duration',
                'category_id',
                'stock',
                'seller_id',
                'p_code',
                'featured'
            )
            ->with(['images', 'coverImage', 'seller'])
            ->firstOrFail();
    }

    public function checkProductInCart($productId){

       return Cart::query()->where([
            'product_id' => $productId,
            'user_id' => Auth::id()
        ])->exists();
    }

    public function addToCart($productId){

        Cart::query()->create([
            'product_id' => $productId,
            'user_id' => Auth::id(),
            'quantity' => 1
        ]);

    }

    public function getProductFeatures($productId){
       return ProductFeatureValue::query()
            ->with(['categoryFeature', 'categoryFeatureValue'])
            ->where('product_id', $productId)->get();

    }

    public function countqa(){

      return  Question::query()->where('status', 'approved')->count();
    }


    public function getProductQA($productId){

        return Question::query()
            ->with('user')
            ->where(['product_id' => $productId, 'status' => 'approved'])
            ->get();





    }

    public function answer($productId){

        return answer::query()

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

    public function getProductReview($productId){

        return ProductReview::query()

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

    public function submitProductReviews($FormData,$productId,$positiveItems,$NegativeItems){

return ProductReview::query()->create([

            'title' => $FormData['title'],
            'comment' => $FormData['comment'],
            'positive' => implode(',', $positiveItems),
            'negative' => implode(',', $NegativeItems),
            'product_id' => $productId,
            'user_id' => Auth::id()
        ]);

    }

     public function setVote($status, $ReviewId){

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
     }

    public function submitQuestion($FormData,$productId){

        Question::query()->create([

            'title' => $FormData['title'],

            'product_id' => $productId,
            'user_id' => Auth::id()
        ]);
    }

    public function setVoteAnswer($status, $AnswerId){

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
    }

 
}
