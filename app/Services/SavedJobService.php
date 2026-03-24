<?php

namespace App\Services;

use App\Models\Jobb;
use App\Traits\ApiResponseTrait;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\Auth;

class SavedJobService
{
    /**
     * Create a new class instance.
     */
    use ApiResponseTrait;
    public function __construct()
    {
        //
    }
    public function addToSavedJob($jobId){
        Jobb::findOrFail($jobId);
        Auth::user()->saved_jobs()->syncWithoutDetaching($jobId);
        return $this->sendResponse([],'add to saved job sucess');
    }
    public function removeFromSavedJob($jobId){
        Jobb::findOrFail($jobId);
        Auth::user()->saved_jobs()->detach();
        return $this->sendResponse([],'remove from saved job sucess');
    }
    public function getSavedJob(){
        $jobs=Auth::user()->saved_jobs()->get();
        return $this->sendResponse($jobs,'all saved job');
    }
        
}
