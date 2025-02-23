<?php

namespace App\Repositories\Admin;
use App\Models\Story;
use App\Models\Slider;
interface sliderRepositoryInterface
{
  public function submit($formData,$image);


 public function deleteconfirmated($stori);

 public function changestatus(Slider $slider);

}
