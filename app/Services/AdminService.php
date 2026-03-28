<?php

namespace App\Services;

use App\Models\Company;
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
    public function getAllCompany(){
        $company=Company::get();
        return $this->sendResponse($company,'get all success');
    }
    public function approvedCompany($companyId){
        $company=Company::find($companyId);
        if(!$company){
            return $this->sendError('this company not found',404,[]);
        }
        if($company->status==='approved'){
            return $this->sendError('company already approved',402,[]);
        }
        $company->status='approved';
        $company->save();
        return $this->sendResponse($company,'company approved success');
    }
    public function rejectedCompany($companyId){
        $company=Company::find($companyId);
        if(!$company){
            return $this->sendError('company not found',404,[]);
        }
        if($company->status==='rejected'){
            return $this->sendError('company already rejected',402,[]);
        }
        $company->status='rejected';
        $company->save();
        return $this->sendResponse($company,'rejected company  success');
    }
    public function deleteCompany($companyId){
        $company=Company::find($companyId);
        if(!$company){
            return $this->sendError('this company not found',404,[]);
        }
        $company->delete();
        return $this->sendResponse([],'company deleted success');
    }
}
