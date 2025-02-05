<?php

namespace App\Repositories\admin;

use App\Models\City;

class CityRepository implements CityRepositoryInterface
{
    public function submit($FormData, $cityId)
    {

        City::query()
            ->updateOrCreate(
                [
                    'id' => $cityId,
                ],
                [
                    'name' => $FormData['name'],
                    'state_id' => $FormData['stateId'],
                ]
            );

    }
}
