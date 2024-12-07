<?php

namespace App\Repositories;

use App\Models\User;

interface IUserRepository
{
   public function getUsers();
   public function showUser(User $user);
   public function create(array $data);
   public function update(User $user, array $data);

}