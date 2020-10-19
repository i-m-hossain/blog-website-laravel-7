<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = [
        'about',
        'admin',
        'avatar',
        'facebook',
        'youtube',
        'instagram',
        'twitter',
        'user_id'

    ];
    public function user(){

        return $this->belongsTo('App\User');
    }

}
