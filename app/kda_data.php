<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kda_data extends Model
{
    protected $table = 'kda_data';
    //public $primarykey = 'id_kda';

    protected $fillable =[
    'id', 'kda_id', 'item1', 'item1_jum', 'item1_nom',
     'item2', 'item2_jum', 'item2_nom',
     'item3', 'item3_jum', 'item3_nom',
     'item4', 'item4_jum', 'item4_nom',
     'item5', 'item5_jum', 'item5_nom',
     'item6', 'item6_jum', 'item6_nom',
     'item7', 'item7_jum', 'item7_nom',
     'item8', 'item8_jum', 'item8_nom',
     'item9', 'item9_jum', 'item9_nom',
 	];
}
