<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kda_keterangan2 extends Model
{
    public $table = "kda_keterangan2";
    public $fillable = ['id','kda_id', 'kelengkapan', 'kesediaan', 'jumlah', 'nominal'];
}
