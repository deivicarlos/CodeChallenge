<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Reservation extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['user_id'];

    public function guests() {
        return $this->belongsToMany('App\User');
    }

    public function host() {
        return $this->belongsTo('App\User');
    }

}
