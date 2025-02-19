<?php

namespace App\Livewire\Admin\Story;

use App\Models\Story;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\File;
use App\Repositories\admin\storyRepository;

class Index extends Component
{

    use WithPagination, WithFileUploads;

    public $title;

    public $stoies;
    public $thumbnail;
    public $story;

    public  $stori;

    private $repository;

    public function boot(storyRepository $repository){

        $this->repository = $repository;

    }
    public function submit($formData)
    {

        if ($this->thumbnail) {
            $formData['thumbnail'] = $this->thumbnail;
        }
        if ($this->story) {
            $formData['story'] = $this->story;
        }

        $validator = Validator::make($formData, [
            'title' => 'required|string|max:50',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp|max:1024',//1MB
            'story' => 'required|mimes:mp4|max:51200',//50MB
        ], [
            '*.required' => 'فیلد ضروری است.',
            '*.string' => 'فرمت اشتباه است !',
            'thumbnail.mimes' => 'فرمت های مجاز تصویر : jpg,jpeg,png,webp !',
            'story.mimes' => 'فرمت های مجاز استوری : mp4 !',
            'thumbnail.max' => 'سایز تصویر حداکثر : ! 1MB',
            'story.max' => 'سایز استوری حداکثر : ! 50MB',
        ]);

        $validator->validate();
        $this->resetValidation();

        $this->repository->submit($formData,$this->story,$this->thumbnail);

    }

     public function deleteConfirmation(Story $story)
    {


       $this->stori=$story;
        $this->dispatch('deleteshow');
    }
    #[On('deleteconfirmated')]
    public function deleteconfirmated()

    {



$this->repository->deleteconfirmated($this->stori);

        $this->dispatch('success', 'عملیات حذف با موفقیت انجام شد!');
    }
public function changestatus(Story $story){

$this->repository->changestatus($story);
        $this->dispatch('success', 'عملیات ویرایش با موفقیت انجام شد!');
}



    public function render()
    {
        $stories = Story::query()->paginate(10);
        return view(
            'livewire.admin.story.index',
            [
                'stories' => $stories,
            ]
        )->layout('layouts.admin.app');
    }
}
