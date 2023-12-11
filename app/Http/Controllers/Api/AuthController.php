<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Repository\Interfaces\AuthInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(protected AuthInterface $authRepository)
    {

    }

    public function login(LoginRequest $request)
    {
        try {
            return $this->success($this->authRepository->login($request), 'Login Successfully');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(),error_code:400);
        }
    }

    public function logout(Request $request)  {
          try {
            return $this->success($this->authRepository->logout($request), 'Logout Successfully');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
}
