<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(UserUpdateRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        
        if ($request->CHANGE_STATUS == 1) {
            $user->is_active = $user->is_active == 1 ? 0 : 1;
            $user->update();

            return $this->showOne(new UserResource($user), 200);
        }

        try {

            $user->name = $request->name;
            $user->save();

            if ($request->roles) {
                $user->roles()->sync($request->roles);
            }

            return $this->showOne(new UserResource($user), 200);
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
