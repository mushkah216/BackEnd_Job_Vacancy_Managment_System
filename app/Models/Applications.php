<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    //
    protected $table='applications';
    protected $fillable = [ 'user_id','jobb_id','cv','cover_letter'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function jobb(){
        return $this->belongsTo(Jobb::class);
    }
}
