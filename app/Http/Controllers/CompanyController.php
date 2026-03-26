<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\CompanyRequestLogin;
use App\Http\Requests\Company\CompanyRequestRegister;
use App\Http\Requests\Company\CompanyRequestUpdateProfile;
use App\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
     public CompanyService $company_service;
    public function __construct(CompanyService $company_service)
    {
        $this->company_service=$company_service;
    }
    public function register(CompanyRequestRegister $request){
        return $this->company_service->register($request->validated());
    }
    public function login(CompanyRequestLogin $request){
        return $this->company_service->login($request->validated());
    }
    public function logout(Request $request){
        return $this->company_service->logout($request);
    }
    public function getProfile(){
        return $this->company_service->getProfile();
    }
    public function updateProfile(CompanyRequestUpdateProfile $request){
        return $this->company_service->updateProfile($request->validated());
    }
}
