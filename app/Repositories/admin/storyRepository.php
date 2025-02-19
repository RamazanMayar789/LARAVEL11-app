<?php


namespace App\Repositories\Admin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Story;
class storyRepository implements storyRepositoryInterface
{

    public $stories;
    public function submit($formData,$story,$thumbnail){

        $thumbnailFilename = pathinfo($thumbnail->hashName(), PATHINFO_FILENAME) . '.' . $thumbnail->extension();
        $storyFilename = pathinfo($story->hashName(), PATHINFO_FILENAME) . '.' . $story->extension();

        Story::query()->create([
            'title' => $formData['title'],
            'thumbnail' => $thumbnailFilename,
            'story' => $storyFilename,
            /*   'admin_id'=>null,*/
        ]);

        Storage::disk('public')->put('stories/thumbnail', $thumbnail);
        Storage::disk('public')->put('stories/story', $story);
    }



     public function deleteconfirmated($stori){


        $thumbnail = $stori->thumbnail;
        $storyvideo = $stori->story;
        File::delete("stories/thumbnail/" . $thumbnail);
        File::delete("stories/story/" . $storyvideo);



        $stori->delete();

     }

     public function changestatus(Story $story){

        if ($story->status) {
            $story->update(['status' => false]);
        } else {
            $story->update(['status' => true]);
        }

    }
}
