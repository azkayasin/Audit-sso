<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use DB;
use App\kda;
use App\customer;
use App\temuan;
use App\kda_keterangan;

class cobacontroller extends Controller
{

	public function panduan()
	{
		return view('panduan');
	}
	public function getpanduan()
	{
        //$kda = DB::table('kda')->get();
    //     $shares = DB::table('shares')
    // ->join('users', 'users.id', '=', 'shares.user_id')
    // ->join('followers', 'followers.user_id', '=', 'users.id')
    // ->where('followers.follower_id', '=', 3)
    // ->get();

        // $kda = DB::table('kda')
        // ->join('unit', 'unit.id_unit', '=', 'kda.unit')
        // ->join('temuan','temuan.kda_id', '=', 'kda.id_kda')
        // ->get();

        //$kda = kda::find(2)->namaunit;
        $kda = kda::with('data');

     //    $kda = kda::with('temuan')
	    // ->join('unit', 'unit.id_unit', '=', 'kda.unit')
	    // ->get();
        //return $kda;


		return response()->json($kda);
	}
	public function cobatemuan($id)
	{
		$kda = kda::find($id);
		//print($kda);
		//echo "<br><br><br>";

		$currentMonth = date('m');
		$currentYear = date('y');
		print $currentYear;

		$semuakda = kda::select('id_kda')->where('unit', $kda->unit)
		->whereRaw("MONTH(tanggal) < 12 AND YEAR(tanggal) =  20{$currentYear}")
		->get();
		//print($semuakda);
		//$kda = DB::table('temuan')->leftjoin('kda','temuan.kda_id','=','kda.id_kda')->get();


		$temuan = db::table('temuan')->leftjoin('kda','temuan.kda_id','=','kda.id_kda')->whereIn('kda_id', $semuakda)->orderBy('kda.tanggal')->get();
		//dd($temuan);
		$temuan2 = json_decode($temuan);
		//print $temuan->count();
		//print_r($temuan2);
		//dd($temuan2);
		for ($i=1; $i < 13 ; $i++) { 
			foreach ($temuan2 as $key => $value) { 
			//$bulankda = "{$temuan->tanggal}";
			$month = date("m",strtotime($value->tanggal));
			//print $month;
				if ($month == $i) {
					print $value->tanggal;
					print "ini bulan {$i}";
				}
			
			
			}
		}

		

		//print($temuan);



		return $temuan;

	}
	public function bulan()
	{
		// $tanggal = kda::select('tanggal')->where('id_kda', 1)->get();
		// print($tanggal);
    	// $m=date('m',$tanggal);
    	// print($m);
    	//list($year, $month, $day) = explode('-', $tanggal);
    	//print($month);
		// $month = 02;
    	// $bulan = DB::table('kda')->whereMonth($month);
    	// print($bulan);
    	// $bulan2 = DB::table('kda')->where(DB::raw(MONTH('tanggal')), $month);
    	// 	print($bulan2);
		$currentMonth = date('m');
		$data = kda::select('id_kda')
		->where('unit',2)
		->whereRaw('MONTH(tanggal) != ?',[$currentMonth])
		->get();
		//print($data);

		//$temuan = DB::table('temuan')->whereIn('kda_id', $data)->get();
		$temuan = DB::table('temuan')->get();
		//print($temuan);
		return view ("temuan", compact("temuan"));

	}
	public function getkda(Request $request)
	{
		$id = $request->input('id');
		$kda = kda::find($id);
		return response()->json($kda);
	}
	public function updatekda(Request $request)
	{

		$data = $request->all();
		$kda = kda::find($request->idkda);
		//return ($data);
		$kda->update($data, ['except'=>'_token']);
		return redirect('/kda');

	}
	public function updateketerangan(Request $request)
	{

		$data = $request->all();
		$kda = kda_keterangan::find($request->id);
		//return ($data);
		$kda->update($data, ['except'=>'_token']);
		return redirect('/kda');

	}
	public function gettemuan(Request $request)
	{
		$id = $request->input('id');
		$temuan = DB::table('temuan')->where('kda_id',$id)->get();
        //$kda = DB::table('kda')->whereIn('id_kda', $id)->get();
        //return ($kda);
		return response()->json($temuan);
	}
	public function getketerangan(Request $request)
	{
		$id = $request->input('id');
		//$keterangan = kda::find();
		$keterangan = DB::table('kda_keterangan')->where('kda_id',$id)->first();
        //$kda = DB::table('kda')->whereIn('id_kda', $id)->get();
        //return ($keterangan);
		return response()->json($keterangan);
	}
	public function updatetemuan(Request $request)
	{

		$data = $request->all();
		$jumlah = count($data);
		$data = $request->checkbox;
		//dd ($data);
		//dd ($jumlah);

		//return($data);
		//$temuan = temuan::find([$data]);
		//$temuan = DB::table('temuan')->whereIn('id', $data)->get();
		//dd ($temuan);
		temuan::whereIn('id', $data)
		->update([
			'status' => '1'
    	]);
		// for ($i=0; $i < $jumlah; $i++) { 
			//$temuan = temuan::find([$data]);


			// $temuan->update($data, ['except'=>'name','keterangan']);
		
		return redirect('/temuan');

	}
	
	public function coba($id)
	{
		$kda = kda::find($id);
		return ($kda);
	}


}
