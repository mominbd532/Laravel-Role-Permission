<?php

namespace App\Repositories;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository implements IUserRepository
{

    public function getUser(string $email)
    {
        return User::where('email', $email)->first();
    }

    public function create(array $data){

    }

    public function update(User $user, array $data){

        if ($data['CHANGE_STATUS'] == 1) {
            $user->is_active = $user->is_active == 1 ? 0 : 1;
            $user->update();

            return new UserResource($user);
        }

        $user->name = $data['name'];
        $user->save();

        if ($data['roles']) {
            $user->roles()->sync($data['roles']);
        }

        return new UserResource($user);
    }

}
