<?php

namespace App\Repositories\Admin;
use App\Models\Story;
interface storyRepositoryInterface
{
  public function submit($formData, $story, $thumbnail);


 public function deleteconfirmated($stori);

 public function changestatus(Story $story);

}
