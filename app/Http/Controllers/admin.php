<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class admin extends Controller
{
    public function datamaster
    {
    	$data =DB::table('master')->get();
    	return view('admin.data',compact('data'));
    }
}
