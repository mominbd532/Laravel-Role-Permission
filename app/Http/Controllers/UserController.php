<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\IUserRepository;
use Illuminate\Http\Request;

class UserController extends ApiController
{

    private IUserRepository $userRepository;

    function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            return $this->showAll($this->userRepository->getUsers());
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
    public function store(UserStoreRequest $request)
    {

        try {
            return $this->showOne($this->userRepository->create($request->all()), 201);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage(), 403);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        try {
            return $this->showOne($this->userRepository->showUser($user));
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage(), 403);
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
    public function update(UserUpdateRequest $request, User $user)
    {

        try {
            return $this->showOne($this->userRepository->update($user, $request->all()), 201);
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
