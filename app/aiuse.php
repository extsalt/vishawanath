<?php

namespace App;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class aiuse extends Model 
{
    protected $fillable = [
         'user_id','numberofuses'
    ];

    // public function event()
    // {
    //     return $this->belongsTo('App\Event');
    // }
}
