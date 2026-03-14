<?php

namespace App\Repositories;

use App\Models\User;
use App\Traits\Lockable;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    use Lockable;
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function create(array $input){
        $input['password']=Hash::make($input['password']);
        return $this->lockForCreate(    function () use ($input){
            return User::create($input);
        });
    }
    public function getByEmail( $input){
        return User::where('email',$input)->firstOrFail();
    }
}
