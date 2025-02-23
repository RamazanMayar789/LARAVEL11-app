<?php


namespace App\Repositories\Admin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Slider;
class sliderRepository implements sliderRepositoryInterface
{

    public $stories;
    public function submit($formData,$image){

        $imageFilename = pathinfo($image->hashName(), PATHINFO_FILENAME) . '.' . $image->extension();


        Slider::query()->create([
            'title' => $formData['title'],
            'image' => $imageFilename,
            'link' => $formData['link'],

            /*   'admin_id'=>null,*/
        ]);

        Storage::disk('public')->put('sliders', $image);

    }



     public function deleteconfirmated($stori){


        $image = $stori->image;

        File::delete("sliders/" . $image);




        $stori->delete();

     }

     public function changestatus(Slider $slider){

        if ($slider->status) {
            $slider->update(['status' => false]);
        } else {
            $slider->update(['status' => true]);
        }

    }
}
