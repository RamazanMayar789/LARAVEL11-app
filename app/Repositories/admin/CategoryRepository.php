<?php

namespace App\Repositories\admin;

use App\Models\Category;
use App\Models\featureValue;
use App\Models\CategoryFeature;

class CategoryRepository implements CategoryRepositoriesInterface
{


    public function submit($FormData, $categoryId)
    {
        if ($FormData['parentId'] == "") {

            $FormData['parentId'] = null;
        }
        Category::query()->updateOrCreate(
            [
                'id' => $categoryId,
            ],
            [
                'name' => $FormData['name'],
                'category_id' => $FormData['parentId'],
            ]
        );
    }

    public function submitToFeatureValues($FormData, $featureId, $valueId)
    {


        $feature = featureValue::query()->updateOrCreate(
            [
                'id' => $valueId
            ],
            [
                'value' => $FormData['value'],
                'category_feature_id' => $featureId
            ]


        );

    }

    public function submitToCategoryFeature($FormData, $categoryId, $FeatureId)
    {
        $feature = CategoryFeature::query()->updateOrCreate(
            [
                'id' => $FeatureId
            ],
            [
                'name' => $FormData['name'],
                'category_id' => $categoryId
            ]


        );

    }
}
