<?php

namespace App\Services\UserAuth;

use App\Repositories\UserRepository;
use App\Traits\ApiResponseTrait;

class UserService
{
    public UserRepository $user_repository;
    use ApiResponseTrait;
    /**
     * Create a new class instance.
     */
    public function __construct(UserRepository $user_repository)
    {
        $this->user_repository=$user_repository;
    }
    public function register(array $input){
        $user=$this->user_repository->create($input);
        return $this->sendResponse([],'Register successfully',201);
    }
}
