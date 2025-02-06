<?php

namespace App\Repositories\admin;

use App\Models\PaymentMethod;

class PaymentMethodeRepository implements PaymentMethodeRepositoryInterface
{
    public function submit($FormData, $PaymentId)
    {


        PaymentMethod::query()
            ->updateOrCreate(
                [
                    'id' => $PaymentId,
                ],
                [
                    'name' => $FormData['name'],
                    'merchent_code' => $FormData['merchent_code'],
                ]
            );
    }

}
