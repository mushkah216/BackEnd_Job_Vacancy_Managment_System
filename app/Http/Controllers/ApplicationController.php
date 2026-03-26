<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplayRequest;
use App\Services\ApplicationService;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    //
    public ApplicationService $application_service;
    public function __construct(ApplicationService $application_service)
    {
        $this->application_service=$application_service;
    }
    public function applay(ApplayRequest $request){
        return $this->application_service->applay($request->validated());
    }
    public function getApplays(){
        return $this->application_service->getApplays();
    }
    public function showDetails($appId){
        return $this->application_service->showDetails($appId);
    }
    public function removeApp($appId){
        return $this->application_service->removeApp($appId);
    }

}
