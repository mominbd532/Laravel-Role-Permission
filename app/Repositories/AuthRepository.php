<?php

namespace App\Repositories;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\IAuthRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements IAuthRepository
{
    public function login($data)
    {

        $credentials = $this->getCredentials($data);


        $user = $this->isUserExist($data);

      $token =   Auth::guard('web')->attempt($credentials);
        
if( $token){
    $accessToken = $user->createToken('authToken')->accessToken;
}else{
    throw new \Exception('Login failed!');
}
        


        $data = [
            'token' => $accessToken,
            // 'refreshToken' => $refreshToken,
            'user' => new UserResource($user)
        ];

        return $data;
    }

    public function register($data)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        return $data;
    }

    public function logout($user)
    {
        $user->tokens()->delete();
    }

    public function me()
    {
        return new UserResource(Auth::user());
    }


    private function getCredentials($data)
    {

        return ['email' => $data['email'], 'password' => $data['password']];
    }

    private function isUserExist($data)
    {
        $credentials = $this->getCredentials($data);

        unset($credentials['password']);

        $user = User::where($credentials)->where('is_active', 1)->first();

        if (!$user) {
            throw new \Exception('User locked. Please contact with authority!');
        }

        return $user;
    }
}
