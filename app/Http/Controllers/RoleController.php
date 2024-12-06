<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleStoreRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
         
            $roles = Role::latest()->get();
            $roles = RoleResource::collection($roles);
          
            return $this->showAll($roles);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage(), 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleStoreRequest $request)
    {
        

        try {

            $role = new Role();
            $role->name         = $request->name;
            $role->save();

            if ($request->permissions) {
                $role->permissions()->sync($request->permissions);
            }

            return $this->showOne(new RoleResource($role), 201);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage(), 403);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            $role = Role::findOrFail($id);

            $role = new RoleResource($role);
            
            return $this->showOne($role);

        } catch (\Throwable $th) {
            return  $this->errorResponse($th->getMessage(), 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::findOrFail($id);
        
        if ($request->CHANGE_STATUS == 1) {
            $role->is_active = $role->is_active == 1 ? 0 : 1;
            $role->update();

            return $this->showOne(new RoleResource($role), 200);
        }

        try {

            $role->name = $request->name;
            $role->save();

            if ($request->permissions) {
                $role->permissions()->sync($request->permissions);
            }

            return $this->showOne(new RoleResource($role), 200);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage(), 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
