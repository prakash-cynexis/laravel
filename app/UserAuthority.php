<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer user_id
 * @property string name
 **/
class UserAuthority extends Model {

    protected $primaryKey = 'user_id';
    public $timestamps = false;

    public function user() {
        $this->belongsTo(User::class, 'user_id', 'id');
    }
}
