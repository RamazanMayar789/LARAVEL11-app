<?php

namespace App\Repositories\admin;

use App\Models\Country;

class CountryRepository implements CountryRepositoryInterface
{

    public function submit($FormData, $countryId)
    {


        Country::query()
            ->updateOrCreate(
                [
                    'id' => $countryId,
                ],
                [
                    'name' => $FormData['name'],
                ]
            );
    }
}
