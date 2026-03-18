<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Company extends Authenticatable
{
    use SoftDeletes,HasApiTokens;
    //
    protected $table='companies';
    protected $fillable = ['name','email','password','description','website','logo','status','location'];
    protected $hidden = ['password'];

    public function jobbs(){
        return $this->hasMany(Jobb::class);
    }

    public function chats(){
        return $this->hasMany(Chat::class);
    }
}
