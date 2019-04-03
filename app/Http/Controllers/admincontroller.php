<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Master;
use App\Uang;

class admincontroller extends Controller
{
    public function datamaster()
    {
    	$data =DB::table('master')->get();
    	return view('admin.data',compact('data'));
    }
    public function uang()
    {	
    	$judul = DB::table('uang')->where('satuan',NULL)->get();
    	$data16 = DB::table('uang')->where('parent','16')->join('satuan','uang.satuan','=','satuan.id')->get();
    	$data17 = DB::table('uang')->where('parent','17')->join('satuan','uang.satuan','=','satuan.id')->get();
        $data19 = DB::table('uang')->where('parent','19')->join('satuan','uang.satuan','=','satuan.id')->get();
        $data20 = DB::table('uang')->where('parent','20')->join('satuan','uang.satuan','=','satuan.id')->get();
    	//$jumlah = $data->groupBy('$data->id')->count();
    	// $jumlah = select('browser', DB::raw('count(*) as total'))
     //             ->groupBy('browser')
     //             ->get();
    	//$jumlah = $data->groupBy('$data->id')->selectRaw('count(*) as total, $data->id as id')->get();
    	// $jumlah = DB::table('uang')
     //             ->select('parent', DB::raw('count(*) as total'))
     //             ->groupBy('parent')
     //             ->get();
        $jumlah = DB::table('uang')
        ->select('parent', DB::raw('count(*) as total'))
        ->groupBy('parent')
        ->get();
        return view('admin.uang',compact('data16','judul','data17','data19','data20'));
    }

    public function tables()
    {
        $account = Master::first();
        $data['account'] = $this->printMaster($account);

        return view('tables', $data);
    }

    public function printMaster($master)
    {
        $str = "<ul>";
        $str .= "<li>$master->detail</li>";
        foreach ($master->childrenAccounts as $children) {
            $str .= $this->printMaster($children);
        }
        $str .= '</ul>';

        return $str;
    }

    public function getChild(Request $request)
    {
        $childs = Master::where('parent', $request->id)->get();
        return response()->json($childs);
    }
}
