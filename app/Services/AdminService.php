<?php

namespace App\Services;

use App\Models\User;
use App\Traits\ApiResponseTrait;

class AdminService
{
    use ApiResponseTrait;
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function getAllUsers(){
        $users=User::where('role','user')->get();
        return $this->sendResponse($users,'get all users success');
    }
    public function blockUser($userId){
        $user=User::find($userId);
        if(!$user ){
            return $this->sendError('user not found',404,[]);
        }
        if($user->status=='blocked'){
            return $this->sendError('user alredy blocked',401,[]);
        }
        $user->status='blocked';
        $user->save();
        return $this->sendResponse($user,'user blocked success');
    }
    public function activedUser($userId){
        $user=User::find($userId);
        if(!$user){
            return $this->sendError('user not found',404,[]);
        }
        if($user->status=='active'){
            return $this->sendError('user already actived',402,[]);
        }
        $user->status='active';
        $user->save();
        return $this->sendResponse($user,'user be active success');
    }
    public function deleteUser($userId){
        $user=User::find($userId);
        if(!$user){
            return $this->sendError('user not found',404,[]);
        }
        $user->delete();
        return $this->sendResponse([],'users deleted success');
    }
}
