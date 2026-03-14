<?php

namespace App\Services\UserAuth;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 

class UserService
{
    public UserRepository $user_repository;
    use ApiResponseTrait;
    /**
     * Create a new class instance.
     */
    public function __construct(UserRepository $user_repository)
    {
        $this->user_repository=$user_repository;
    }
    public function register(array $input){
        $user=$this->user_repository->create($input);
        return $this->sendResponse([],'Register successfully',201);
    }
    public function login(array $input){
        
        if(!Auth::attempt(['email'=>$input['email'],'password'=>$input['password']]))
            return $this->sendError('invalid email orpassword',401,[]);
      // $user=User::where('email',$input['email'])->firstOrFail();
        $user=$this->user_repository->getByEmail($input['email']);
        $token=$user->createToken('authTok')->plainTextToken;
        return $this->sendResponse([ 'token'=>$token],'login success');
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return $this->sendResponse([],'deleted successfully',203);
    }
}
