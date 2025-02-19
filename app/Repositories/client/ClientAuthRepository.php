<?php

namespace App\Repositories\client;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ClientAuthRepository implements ClientAuthRepositoryInterface
{
    public function checkUser($user){

        $existingUser=User::query()->where('email',$user['email'])->first();

        if(!$existingUser){

            $newUser=User::query()->updateOrCreate(

                [
                    'email' => $user['email'],
                ],
                [
                'name'=>$user['name'],

                'picture' => $user['picture'],

            ]);
            Auth::login($newUser,true);
        }else{
            Auth::login($existingUser,true);
        }
      
    }
}
