<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAuthority extends Model {

    protected $primaryKey = 'user_id';
    public $timestamps = false;

    public function user() {
        $this->belongsTo('App\User', 'user_id', 'id');
    }
}
