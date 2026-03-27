<?php

namespace App\Services;

use App\Models\Applications;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Auth;

class ApplicationService
{
    use ApiResponseTrait;
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function applay(array $input){
        $user_id=Auth::user()->id;
        $input['user_id']=$user_id;
        $app=Applications::create($input);
        return $this->sendResponse($app,'create application success',201);
    }
    public function getApplays(){
        $user_id=Auth::user()->id;
        $apps=Applications::where('user_id',$user_id)->get();
        return $this->sendResponse($apps,'get application success');
    }
    public function showDetails($appId){
        $app=Applications::find($appId);
        if(!$app){
            return $this->sendError('this app not found',404,[]);
        }
        return $this->sendResponse($app,'get deltail success'); 
    }
    public function removeApp($appId){
        Applications::where('id',$appId)->delete();
        return $this->sendResponse([],'deleted success',203);
    }
    public function getAllApplication(){
       // Auth::user();
       $apps=Applications::all();
       return  $this->sendResponse($apps,'this is all application');

    }
    public function acceptApplication($appId){
        $app=Applications::find($appId);
        if(!$app){
            return $this->sendError('this id of application invalid',403,[]);
        }
       $app->status='accept';
       $app->save();
       return $this->sendResponse($app,'accept app success',201);
      
    }
    public function rejectApplication($appId){
        $app=Applications::find($appId);
        if(!$app){
            return $this->sendError('this id are invalid',403,[]);
        }
        $app->status='reject';
        $app->save();
        return $this->sendResponse($app,'reject success',201);
    }
}
