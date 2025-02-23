<?php

namespace App\Livewire\Admin\Slider;

use Livewire\Component;
use App\Models\Slider;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\On;
use App\Repositories\Admin\sliderRepository;
use Livewire\WithFileUploads;
class Index extends Component
{
    public $image;
    public $link;
    public $title;
    public $stori;

    private $repository;

use WithFileUploads;
    public function boot(sliderRepository $repository){

$this->repository = $repository;
    }

    public function submit($formData)
    {

        if ($this->image) {
            $formData['image'] = $this->image;
        }

        $validator = Validator::make($formData, [
            'title' => 'required|string|max:50',
            'link' => 'required|url',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp,gif|max:2024',//1MB

        ], [
            '*.required' => 'فیلد ضروری است.',
            '*.string' => 'فرمت اشتباه است !',
            'image.mimes' => 'فرمت های مجاز تصویر : jpg,jpeg,png,webp !',

            'image.max' => 'سایز تصویر حداکثر : ! 1MB',

        ]);

        $validator->validate();
        $this->resetValidation();

        $this->repository->submit($formData,  $this->image);
        $this->reset();

    }

    public function deleteConfirmation(Slider $slider)
    {


        $this->stori = $slider;
        $this->dispatch('deleteshow');
    }
    #[On('deleteconfirmated')]
    public function deleteconfirmated()
    {



        $this->repository->deleteconfirmated($this->stori);

        $this->dispatch('success', 'عملیات حذف با موفقیت انجام شد!');
    }

    public function changestatus(Slider $slider)
    {

        $this->repository->changestatus($slider);
        $this->dispatch('success', 'عملیات ویرایش با موفقیت انجام شد!');
    }


    public function render()
    {

        $sliders=Slider::query()->get();
        return view('livewire.admin.slider.index',
        [
            'sliders' => $sliders
        ]
        )->layout('layouts.admin.app');
    }
}
