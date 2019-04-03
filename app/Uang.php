<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Uang extends Model
{
    protected $table = 'uang';

    public function master()
	{
		return $this->belongsTo('App\master');
	}
	public function semuaanak()
	{
		return $this->anak()->with('semuaanak');
	}
}
