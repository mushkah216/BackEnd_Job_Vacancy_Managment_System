<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    //
    protected $table='favourite';
    protected $fillable = ['user_id','jobb_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function jobb(){
        return $this->belongsTo(Jobb::class);
    }
}
