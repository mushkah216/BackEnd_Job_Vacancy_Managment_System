<?php

namespace App\Services;

use App\Http\Resources\JobResource;
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
    public function getJob(Jobb $jobId){
         $jobId->load('company');
        return $this->sendResponse(new JobResource($jobId),'get job success',200);
    }
    public function updateJob(array $input,$jobId){
        $jobb=Jobb::where('id',$jobId)->firstOrFail();
         $jobb->update($input);
         $jobb->save();      
        return $this->sendResponse([],'job updated successfully');
    }
    public function deleteJob(Jobb $jobId){
        $jobId->delete();
        return $this->sendResponse([],'deleted success',203);
    }
   
}
