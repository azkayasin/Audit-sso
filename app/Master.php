<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
	protected $table = 'master';

	public function anak()
	{

    	$childs = Master::where('parent', $this->id)->get();
    	return $childs->with('anak');
		//return $this->hasMany('App\Uang', 'parent', 'id');
	}
	public function childrenAccounts()
	{
	    return $this->hasMany('App\Master', 'parent', 'id')->with('childrenAccounts');
	}

	public function allChildrenAccounts()
	{
	    return $this->childrenAccounts()->with('allChildrenAccounts');
	}
}
