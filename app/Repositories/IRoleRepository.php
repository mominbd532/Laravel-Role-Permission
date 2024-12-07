<?php

namespace App\Repositories;

use App\Models\Blog;
use App\Models\Role;

interface IRoleRepository
{
   public function get();
   public function show(Role $role);
   public function create(array $data);
   public function update(Role $role, array $data);

}