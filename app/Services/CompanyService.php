<?php

namespace App\Services;

use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CompanyService
{
    use ApiResponseTrait;
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function register(array $input){
        $input['password']=Hash::make($input['password']);
        $company=Company::create($input);
        return $this->sendResponse($company,'company register success',201);
        
    }
    public function login(array $input){
        if(!Auth::guard('company')->attempt(['email'=>$input['email'],'password'=>$input['password']]))
            return $this->sendError('invalid email or password',403,[]);
        $company=Company::where('email',$input['email'])->firstOrFail();
        $token=$company->createToken('company')->plainTextToken;

        return $this->sendResponse(['token:'=>$token],'login sucess');
    }
    public function logout(Request $request){
        $company=$request->user();
        $company->currentAccessToken()->delete();
        return $this->sendResponse([],'deleted success',203);
    }
    public function getProfile(){
        $company_id=Auth::user()->id;
        $company=Company::findOrFail($company_id);
        return new CompanyResource($company);        
    }
    public function updateProfile(array $input){
        $company_id=Auth::user()->id;
        $company=Company::findOrFail($company_id)->update($input);
        return $this->sendResponse([],'company updated success');
    }
}
