<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Summernote extends Model
{
    protected $table = 'summernotes';
    //public $primarykey = 'id_kda';

    protected $fillable =[
    'id','tipe', 'content'];
}
