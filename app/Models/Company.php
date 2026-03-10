<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    //
    protected $table='companies';
    protected $fillable = ['name','email','password','description','website','logo','status','location'];

    public function jobbs(){
        return $this->hasMany(Jobb::class);
    }

    public function chats(){
        return $this->hasMany(Chat::class);
    }
}
