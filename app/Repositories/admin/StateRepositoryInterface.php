<?php

namespace App\Repositories\admin;

interface StateRepositoryInterface
{
   public function submit($FormData, $stateId);
}
