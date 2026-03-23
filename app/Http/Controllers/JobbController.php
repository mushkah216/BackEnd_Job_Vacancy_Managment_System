<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\CompanyRequestLogin;
use App\Http\Requests\Company\CompanyRequestRegister;
use App\Http\Requests\Job\CreateJobRequest;
use App\Http\Requests\Jobb\JobbRequestLogin;
use App\Http\Requests\Jobb\JobbRequestRegister;
use App\Services\CompanyService;
use App\Services\JobbService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class JobbController extends Controller
{
    use ApiResponseTrait;
    public JobbService $jobb_service;
    public function __construct(JobbService $jobb_service)
    {
        $this->jobb_service=$jobb_service;
    }
    public function addJob(CreateJobRequest $request){
        return $this->jobb_service->addJob($request->validated());
    }
    public function getJobs(){
        return $this->jobb_service->getJobs();
    }
    
   
}
