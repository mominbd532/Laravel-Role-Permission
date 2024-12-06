<?php

namespace App\Repositories;

use App\Models\User;

interface IAuthRepository
{
    public function login(Array $data);
    public function register(Array $data);
    public function logout($user);
    public function me();
}
