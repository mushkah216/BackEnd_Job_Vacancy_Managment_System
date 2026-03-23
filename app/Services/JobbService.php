<?php

namespace App\Services;

use App\Models\Jobb;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Auth;

class JobbService
{
    /**
     * Create a new class instance.
     */
    use ApiResponseTrait;
    public function __construct()
    {
        //
    }
    public function addJob(array $input){
        $company_id=Auth::user()->id;
        $input['company_id']=$company_id;
        $job=Jobb::create($input);
        return $this->sendResponse($job,'job created success');
    }
    public function getJobs(){
        $company_id=Auth::user()->id;
        $jobs=Jobb::where('company_id',$company_id)->get();
        return $this->sendResponse($jobs,'get all jobs successfully',200);
    }
   
}
