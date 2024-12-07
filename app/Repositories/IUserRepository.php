<?php

namespace App\Repositories;

use App\Models\User;

interface IUserRepository
{
   public function getUser(string $email);
   public function create(array $data);
   public function update(User $user, array $data);

}