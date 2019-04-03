<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\TagList;
use App\Temuan;
use App\kda;
use App\kda_keterangan;
use App\kda_keterangan2;
use App\kda_data;
use Validator;
use DB;
use PDF;


class temuanController extends Controller
{
    public function buatpdf($id)
    {
        $temuan = DB::table('temuan')->where('kda_id',$id)->get();
        $kda = DB::table('kda')->where('id_kda',$id)->leftjoin('unit','kda.unit','=','unit.id_unit')->first();
        //$kda = json_encode($kda);
        //$kda = DB::table('kda')->where('id_kda','$id') ->leftjoin('unit','kda.unit','=','unit.id_unit')->get();
        //return response()->json($kda);
        //return ($temuan);
        $nama = $kda->nama."-".$kda->tanggal;
        //return response()->json($nama);
        $pdf = PDF::loadView('pdf', ['kda' => $kda, 'temuan' => $temuan]);
        return $pdf->download($nama.'.pdf');
    }
    
    // public function addMore()
    // {
    //     return view("addMore");
    // }


    // public function addMorePost(Request $request)
    // {
    //     $rules = [];


    //     foreach($request->input('name') as $key => $value) {
    //         $rules["unit.{$key}"] = 'required';
    //         $rules["tanggal.{$key}"] = 'required';
    //         $rules["name.{$key}"] = 'required';
    //     }


    //     $validator = Validator::make($request->all(), $rules);


    //     if ($validator->passes()) {


    //         foreach($request->input('name') as $key => $value) {
    //             TagList::create(['name'=>$value]);
    //         }


    //         return response()->json(['success'=>'done']);
    //     }


    //     return response()->json(['error'=>$validator->errors()->all()]);
    // }

    public function tambah()
    {
        $unit = DB::table('unit')->get();
        $unit1 = DB::table('unit')->get();
        return view("tambah", compact('unit','unit1'));
    }

    public function tambahkda1(Request $request)
    {
        $input = $request->all();
        //print_r($input);
            $tanggaltampung = $input['masa_audit'];
            $tanggaltampung .="-01";

            $kda= new kda;
            $kda->unit = $input['unit'];
            $kda->masa_audit = $tanggaltampung;
            $kda->bulan_audit = $input['bulan_audit'];
            $kda->jenis = 1;
            $kda->save();

            // $data = new kda_data;
            // $data->kda_id = $kda->id_kda;
            // $data->item1 = $input['item1'];    
            // $data->item1_jum = $input['item1_jum'];
            // $data->item1_nom = $input['item1_nom'];
            // $data->item2 = $input['item2'];
            // $data->item2_jum = $input['item2_jum'];
            // $data->item2_nom = $input['item2_nom'];
            // $data->item3 = $input['item3'];
            // $data->item3_jum = $input['item3_jum'];
            // $data->item3_nom = $input['item3_nom'];
            // $data->item4 = $input['item4'];
            // $data->item4_jum = $input['item4_jum'];
            // $data->item4_nom = $input['item4_nom'];
            // $data->item5 = $input['item5'];
            // $data->item5_jum = $input['item5_jum'];
            // $data->item5_nom = $input['item5_nom'];
            // $data->item6 = $input['item6'];
            // $data->item6_jum = $input['item6_jum'];
            // $data->item6_nom = $input['item6_nom'];
            // $data->item7 = $input['item7'];
            // $data->item7_jum = $input['item7_jum'];
            // $data->item7_nom = $input['item7_nom'];
            // $data->item8 = $input['item8'];
            // $data->item8_jum = $input['item8_jum'];
            // $data->item8_nom = $input['item8_nom'];
            // $data->item9 = $input['item9'];
            // $data->item9_jum = $input['item9_jum'];
            // $data->item9_nom = $input['item9_nom'];
            // $data->save();

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
        //print_r($input);
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

            // $data = new kda_data;
            // $data->kda_id = $kda->id_kda;
            // $data->item1 = $input['item1'];    
            // $data->item1_jum = $input['item1_jum'];
            // $data->item1_nom = $input['item1_nom'];
            // $data->item2 = $input['item2'];
            // $data->item2_jum = $input['item2_jum'];
            // $data->item2_nom = $input['item2_nom'];
            // $data->item3 = $input['item3'];
            // $data->item3_jum = $input['item3_jum'];
            // $data->item3_nom = $input['item3_nom'];
            // $data->item4 = $input['item4'];
            // $data->item4_jum = $input['item4_jum'];
            // $data->item4_nom = $input['item4_nom'];
            // $data->item5 = $input['item5'];
            // $data->item5_jum = $input['item5_jum'];
            // $data->item5_nom = $input['item5_nom'];
            // $data->item6 = $input['item6'];
            // $data->item6_jum = $input['item6_jum'];
            // $data->item6_nom = $input['item6_nom'];
            // $data->item7 = $input['item7'];
            // $data->item7_jum = $input['item7_jum'];
            // $data->item7_nom = $input['item7_nom'];
            // $data->item8 = $input['item8'];
            // $data->item8_jum = $input['item8_jum'];
            // $data->item8_nom = $input['item8_nom'];
            // $data->item9 = $input['item9'];
            // $data->item9_jum = $input['item9_jum'];
            // $data->item9_nom = $input['item9_nom'];
            // $data->save();
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
            //return print_r($input);
            return response()->json(['success'=>'done']);            
        }
        return response()->json(['error'=>$validator->errors()->all()]);

        //     foreach($request->input('name') as $key => $value) {
        //         Temuan::create(['name'=>$value, 'id_kda'=>1,'keterangan'=>$value]);
        //     }


        //     return response()->json(['success'=>'done']);
        // }


        // return response()->json(['error'=>$validator->errors()->all()]);
    }
    public function tambahkda3(Request $request)
    {
        $input = $request->all();
        // print_r($input);
        // return $input;
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
        //dd($semuakda);
        $temuan1 = db::table('temuan')->leftjoin('kda','temuan.kda_id','=','kda.id_kda')->whereIn('kda_id', $semuakda)
        ->where('temuan.status',0)
        ->orderBy('kda.bulan_audit')->get();
        //return json($temuan1);
        return response()->json($temuan1);
    }

    
}