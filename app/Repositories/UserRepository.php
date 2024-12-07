<?php

namespace App\Repositories;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository implements IUserRepository
{

    public function getUsers()
    {
        $users = User::latest()->get();
        return new UserResource($users);
    }

    public function showUser(User $user){
        return new UserResource($user);
    }

    public function create(array $data){

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();
        $user->roles()->attach($data['roles']);

        return new UserResource($user);

    }

    public function update(User $user, array $data){

        $user->name = $data['name'];
        $user->save();

        if ($data['roles']) {
            $user->roles()->sync($data['roles']);
        }

        return new UserResource($user);
    }

}
