<?php

namespace App\Repositories\admin;

use App\Models\State;

class StateRepository implements StateRepositoryInterface
{

    public function submit($FormData, $stateId)
    {

        State::query()
            ->updateOrCreate(
                [
                    'id' => $stateId,
                ],
                [
                    'name' => $FormData['name'],
                    'country_id' => $FormData['countryId'],
                ]
            );

    }

}
