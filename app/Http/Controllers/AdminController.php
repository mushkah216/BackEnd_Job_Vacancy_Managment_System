<?php

namespace App\Http\Controllers;

use App\Services\AdminService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public AdminService $admin_service;
    public function __construct(AdminService $admin_service)
    {
        $this->admin_service=$admin_service;
    }
    public function getAllUsers(){
        return $this->admin_service->getAllUsers();
    }
    public function blockUser($userId){
        return $this->admin_service->blockUser($userId);
    }
    public function activedUser($userId){
        return $this->admin_service->activedUser($userId);
    }
    public function deleteUser($userId){
        return $this->admin_service->deleteUser($userId);
    }
}
