<?php

namespace App\Repositories\admin;

interface DeliveryRepositoryInterface
{
  public function submit($FormData, $deliveryId);
}
