<?php

namespace App\Services;

use App\Models\Jobb;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Auth;

class FavouriteJobService
{
    /**
     * Create a new class instance.
     */
    use ApiResponseTrait;
    public function __construct()
    {
        //
    }
    public function addToFavourite( $jobId){
        Jobb::FindOrFail($jobId);
      
        Auth::user()->favourites()->syncWithoutDetaching($jobId);
        return $this->sendResponse([],'add to favourite success');

    }
    public function removeFromFavourite( $jobId){
        Jobb::findOrFail($jobId);
        Auth::user()->favourites()->detach($jobId);
        return $this->sendResponse([],'out fav success');
    }
    public function getFavouriteJob(){
        $jobs= Auth::user()->favourites()->get();
        return $this->sendResponse($jobs,' fav success');
    }
}
