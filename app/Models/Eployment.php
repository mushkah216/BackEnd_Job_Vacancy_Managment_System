<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Eployment extends Model
{
    //
    use SoftDeletes;

    protected $table='eployments';
    protected $fillable = ['user_id','jobb_id','start_date','end_date','salary','contract'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function jobb(){
        return $this->belongsTo(Jobb::class);
    }
}
