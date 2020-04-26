<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['user_id', 'client', 'employee', 'admin'];

    public function relUser(){
        $this->hasOne('App\User', 'id', 'id_user');
    }
}
