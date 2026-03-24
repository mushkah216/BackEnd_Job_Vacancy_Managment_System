<?php

namespace App\Http\Controllers;

use App\Models\Jobb;
use App\Services\FavouriteJobService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class FavouriteJobController extends Controller
{
    //
   // use ApiResponseTrait;
    public FavouriteJobService $favourite_job_service;
    public function __construct(FavouriteJobService $favourite_job_service){
        $this->favourite_job_service=$favourite_job_service;
    }
    
    public function addToFavourite( $JobId){
        return $this->favourite_job_service->addToFavourite($JobId);
    }
    public function removeFromFavourite( $JobId){
        return $this->favourite_job_service->removeFromFavourite($JobId);
    }
    public function getFavouriteJob(){
        return $this->favourite_job_service->getFavouriteJob();
    }
}
