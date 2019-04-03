<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class kda extends Model
{
    protected $table = 'kda';
    //public $primarykey = 'id_kda';
    protected $primaryKey = 'id_kda';

    protected $fillable =[
    'id_kda',
    'unit',
    'masa_audit',
    'bulan_audit',
    'jenis',
    ];

    public function temuan()
    {
    	return $this->hasMany('App\temuan','kda_id','id_kda');
    }
    public function namaunit()
    {
    	return $this->hasOne('App\unit','id_unit','unit');
    }
    public function data()
    {
        return DB::table('kda')->get();
    }
}
