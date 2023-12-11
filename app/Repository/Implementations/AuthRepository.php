<?php

namespace App\Repository\Implementations;

use App\Models\User;
use App\Repository\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements AuthInterface
{

    public function login($request)
    {
         $user = User::where('username', $request->username)->first();
     
        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('tulips-backed')->plainTextToken;
            
            return [
                'username'=>$user->username,
                'access_token'=>$token,
                'email'=>$user->email
            ]; 
        } else {
            abort_if(!$user, 422,'incorrect username or password');

        }

    }

    public function logout( $request)
    {
        $request->user()->tokens()->delete();
       
    }
}
