<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jobb extends Model
{
    //
    use SoftDeletes;

    protected $table='jobbs';
    protected $fillable = ['company_id','title','descrption','requirement','min_salary','max_salary','status'];

    public function applications(){
        return $this->hasMany(Applications::class);
    }

    public function eployments(){
        return $this->hasMany(Eployment::class);
    }

    public function favourites(){
        return $this->belongsToMany(User::class,'favourites');
    }

    public function saved_jobs(){
        return $this->belongsToMany(User::class,'saved_jobs');
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
     
}
