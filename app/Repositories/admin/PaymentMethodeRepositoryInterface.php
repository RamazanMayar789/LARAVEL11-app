<?php

namespace App\Repositories\admin;

interface PaymentMethodeRepositoryInterface
{
  public function submit($FormData, $PaymentId);
}
