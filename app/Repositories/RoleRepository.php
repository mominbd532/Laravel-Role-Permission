<?php

namespace App\Repositories;

use App\Http\Resources\RoleResource;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class RoleRepository implements IRoleRepository
{

    public function get()
    {
        $roles = Role::latest()->get();
        return RoleResource::collection($roles);
       
       
    }

    public function show(Role $role){
        return new RoleResource($role);
    }

    public function create(array $data){

       
        $role = new Role();
        $role->name = $data['name'];
        $role->save();

        if ($data['permissions']) {
            $role->permissions()->attach($data['permissions']);
        }

       

        return new RoleResource($role);

    }

    public function update(Role $role, array $data){

        $role->name = $data['name'];
        $role->save();

        if (isset($data['permissions'])) {
            $existingPermissions = Permission::whereIn('id', $data['permissions'])->pluck('id');
            if ($existingPermissions->count() > 0) {
                $role->permissions()->attach($existingPermissions);
            }
        }

        return new RoleResource($role);
    }

}
