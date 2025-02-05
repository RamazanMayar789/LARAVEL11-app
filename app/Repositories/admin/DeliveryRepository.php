<?php

namespace App\Repositories\admin;

use App\Models\DeliveryMethod;

class DeliveryRepository implements DeliveryRepositoryInterface
{

    public function submit($FormData, $deliveryId)
    {


        DeliveryMethod::query()
            ->updateOrCreate(
                [
                    'id' => $deliveryId,
                ],
                [
                    'name' => $FormData['name'],
                    'price' => $FormData['price'],
                ]
            );
    }

}
