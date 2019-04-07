<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\kda;
use App\summernote;
use App\kda_keterangan;
use App\kda_keterangan2;
use Validator;
use App\Temuan;
//require 'vendor/autoload.php';

use Carbon\Carbon;

class KdaController extends Controller
{
	public function index()
	{
		$kda = DB::table('kda')->leftjoin('unit','kda.unit','=','unit.id_unit')->orderBy('kda.bulan_audit')->get();
		//dd($kda);
		$unit = DB::table('unit')->get();
    	//$kda = DB::table('kda')->get();
    	//return response()->json($kda);
		return view ("kda5", compact('kda','unit'));
	}
	public function buatkda()
	{
		$unit = DB::table('unit')->get();
		$summernote = DB::table('summernotes')->where('id','>' ,4)->get();
        return view("buatkda", compact('unit','summernote'));
	}
	public function triwulan()
	{
		//$kda = DB::table('kda')->leftjoin('unit','kda.unit','=','unit.id_unit')->get();
    	//$kda = DB::table('kda')->get();
    	//return response()->json($kda);
		$now = Carbon::now();
		$tahun = $now->year;
		$bulan = 12;
		// echo $now->month;
		// echo $now->weekOfYear;
		// echo $now->day;


		//printf("Now: %s", Carbon::now());
		return view ("triwulan", compact('tahun','bulan'));
	}
	public function tambahkda1(Request $request)
    {
        $input = $request->all();
            $tanggaltampung = $input['masa_audit'];
            $tanggaltampung .="-01";

            $kda= new kda;
            $kda->unit = $input['unit'];
            $kda->masa_audit = $tanggaltampung;
            $kda->bulan_audit = $input['bulan_audit'];
            $kda->jenis = 1;
            $kda->save();

            $jumlah = count($input['kelengkapan']);
            for ($i=0; $i < $jumlah; ++$i) 
            {

                $ket= new kda_keterangan2;        
                $ket->kelengkapan = $input['kelengkapan'][$i];
                $ket->kesediaan= $input['kesediaan'][$i];
                $ket->jumlah= $input['jumlah'][$i];
                $ket->nominal = $input['nom'][$i];
                $ket->kda_id= $kda->id_kda;
                $ket->save();  
            }
            
            return response()->json(['success'=>'done']);
        
    }
    public function tambahkda2(Request $request)
    {
        $input = $request->all();
        $rules = [];


        foreach($request->input('kwitansi') as $key => $value) {
            $rules["kwitansi.{$key}"] = 'required';
            $rules["nominal.{$key}"] = 'required';
            $rules["keterangan.{$key}"] = 'required';
        }


        $validator = Validator::make($request->all(), $rules);


        if ($validator->passes())
        {
           $tanggaltampung = $input['masa_audit'];
            $tanggaltampung .="-01";

            $kda= new kda;
            $kda->unit = $input['unit'];
            $kda->masa_audit = $tanggaltampung;
            $kda->bulan_audit = $input['bulan_audit'];
            $kda->jenis = 2;
            $kda->save();

            $jumlah2 = count($input['kelengkapan']);
            for ($i=0; $i < $jumlah2; ++$i) 
            {

                $ket= new kda_keterangan2;        
                $ket->kelengkapan = $input['kelengkapan'][$i];
                $ket->kesediaan= $input['kesediaan'][$i];
                $ket->jumlah= $input['jumlah'][$i];
                $ket->nominal = $input['nom'][$i];
                $ket->kda_id= $kda->id_kda;
                $ket->save();  
            }

            $jumlah = count($input['kwitansi']);
            for ($i=0; $i < $jumlah; ++$i) 
            {

                $temuan= new temuan;        
                $temuan->kwitansi = $input['kwitansi'][$i];
                $temuan->nominal= $input['nominal'][$i];
                $temuan->keterangan= $input['keterangan'][$i];
                $temuan->kda_id= $kda->id_kda;
                $temuan->save();  
            }
            return response()->json(['success'=>'done']);            
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    public function tambahkda3(Request $request)
    {
	    $input = $request->all();
	    $tanggaltampung = $input['masa_audit'];
	    $tanggaltampung .="-01";

	    $kda= new kda;
	    $kda->unit = $input['unit'];
	    $kda->masa_audit = $tanggaltampung;
	    $kda->bulan_audit = $input['bulan_audit'];
	    $kda->jenis = $input['jenis_kda3'];
	    $kda->save();

	    $ket = new kda_keterangan;
	    $ket->kondisi = $input['kondisi'];
	    $ket->kesimpulan = $input['kesimpulan'];
	    $ket->saran = $input['saran'];
	    $ket->rekomendasi = $input['rekomendasi'];
	    $ket->tanggapan = $input['tanggapan'];
	    $ket->kda_id = $kda->id_kda;
	    $ket->save();

	    return response()->json(['success'=>'done']);
        
    }
    public function gettemuanlama(Request $request){
        //untuk mencatat temuan sebelumnya (belum kondisi yg status 1)
        $unit = $request->input('unit');
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');
        $semuakda = kda::select('id_kda')->where('unit', $unit)
        ->whereRaw(" MONTH(bulan_audit) < {$bulan}  AND YEAR(bulan_audit) =  {$tahun}")
        ->get();
        $temuan1 = db::table('temuan')->join('kda','temuan.kda_id','=','kda.id_kda')->whereIn('kda_id', $semuakda)
        ->where('temuan.status',0)
        ->orderBy('kda.bulan_audit')->get();
        return response()->json($temuan1);
    }
    public function updatekda(Request $request)
    {
        $data = $request->all();
        $kda = kda::find($request->idkda);
        $kda->update($data, ['except'=>'_token']);
        return redirect('/kda');

    }
    public function template()
	{

		$summernote = DB::table('summernotes')->get();
		//dd($summernote);
        return view("templatekda", compact('summernote'));
	}
















	public function pilih()
	{

		$unit = DB::table('unit')->get();
        return view("pilihkdarevisi3", compact('unit'));

	}
	public function pilih2()
	{

		$unit = DB::table('unit')->get();
		$summernote = DB::table('summernotes')->where('id','>' ,4)->get();
		//dd($summernote);
        return view("pilihkdarevisi3", compact('unit','summernote'));

	}

}
