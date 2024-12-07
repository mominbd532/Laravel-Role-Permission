<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Repositories\IAuthRepository;
use Illuminate\Http\Request;

class AuthController extends ApiController
{
    private IAuthRepository $authRepository;

    function __construct(IAuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(RegisterRequest $request)
    {
        try {
        
            return $this->showOne($this->authRepository->register($request->all()));
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function login(LoginRequest $request)
    {
        try {
              
            return $this->showOne($this->authRepository->login($request->all()));
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 401);
        }
    }

    public function logout(Request $request)
    {
        try {
            $this->authRepository->logout($request->user());
            return $this->showOne('Logged out successfully');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function me(Request $request)
    {
        try {
            return $this->showOne($this->authRepository->me());
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }
}
