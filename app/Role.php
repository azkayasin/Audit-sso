<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table = 'role';
    public function getUserObject()
    	{
    		return $this->belongsToMany('App\User')->using('App\UserRole');
    	}
}
