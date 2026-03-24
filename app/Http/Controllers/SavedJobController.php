<?php

namespace App\Http\Controllers;

use App\Services\SavedJobService;
use Illuminate\Http\Request;

class SavedJobController extends Controller
{
    //
    public SavedJobService $saved_job_service;
    public function __construct(SavedJobService $saved_job_service)
    {
        $this->saved_job_service=$saved_job_service;
    }
    public function addToSavedJob($jobId){
        return $this->saved_job_service->addToSavedJob($jobId);
    }
    public function removeFromSavedJob($jobId){
        return $this->saved_job_service->removeFromSavedJob($jobId);
    }
    public function getSavedJob(){
        return $this->saved_job_service->getSavedJob();
    }
}
