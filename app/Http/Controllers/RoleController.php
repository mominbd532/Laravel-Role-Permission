<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleStoreRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use App\Repositories\IRoleRepository;
use Illuminate\Http\Request;

class RoleController extends ApiController
{
    private IRoleRepository $roleRepository;

    function __construct(IRoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return $this->showAll($this->roleRepository->get());
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

            return $this->showOne($this->roleRepository->create($request->all()), 201);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage(), 403);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        try {

            return $this->showOne($this->roleRepository->show($role));

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
    public function update(Request $request, Role $role)
    {
       

        try {

            return $this->showOne($this->roleRepository->update($role, $request->all()), 200);
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
