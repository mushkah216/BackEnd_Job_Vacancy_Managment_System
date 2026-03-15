<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserRequestChangePassword;
use App\Http\Requests\User\UserRequestLogin;
use App\Http\Requests\User\UserRequestRegister;
use App\Services\UserAuth\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public UserService $user_service;
    //
    public function __construct(UserService $user_service)
    {
        $this->user_service=$user_service;
    }
    public function register(UserRequestRegister $request){
        return $this->user_service->register($request->validated());
    }
    public function login(UserRequestLogin $request){
        return $this->user_service->login($request->validated());
    }
    public function logout(Request $request){
        return $this->user_service->logout($request);
    }
    public function changePassword(UserRequestChangePassword $request){
        return $this->user_service->changePassword($request->validated());
    }
    // public function deleteAccount(){
    //     return $this->user_service->deleteAccount();
    // }
}
