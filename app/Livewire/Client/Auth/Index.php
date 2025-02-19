<?php

namespace App\Livewire\Client\Auth;

use App\Models\User;
use Livewire\Component;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;
use App\Notifications\SendsmsNotification;
use Illuminate\Notifications\Notification;
use App\Notifications\Channels\SmsChannels;
use App\Repositories\client\ClientAuthRepository;
use App\Repositories\client\ClientAuthRepositoryInterface;

class Index extends Component
{

public $email;
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function submit($FormData){
        $existingUser = User::query()->where('email', $FormData['email'])->first();

        if($existingUser){
            return redirect()->route('client.home');

        }
    }
    public function handleProviderCallback()
    {

        $repository = new ClientAuthRepository();
        $user = Socialite::driver('google')->stateless()->user();


         $repository->checkUser($user);
        return redirect()->route('client.home');

    }
    public function render()
    {
        return view('livewire.client.auth.index')->layout('layouts.client.app-auth');
    }
}
