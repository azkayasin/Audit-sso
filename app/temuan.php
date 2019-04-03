<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class Temuan extends Model
{
    public $table = "temuan";
    public $fillable = ['id','kwitansi','nominal','keterangan','id_kda','status'];

    public function kda() {
        return $this->belongsTo('App\kda');
    }
}