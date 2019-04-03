<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Temuan;
use App\kda;
use App\kda_data;
use App\kda_keterangan2;
use PDF;
use DB;
use Zipper;
use File;
use Redirect;
use Session;

class pdfcontroller extends Controller
{
	// public function buatpdf($id)
	// {
	// 	$temuan = DB::table('temuan')->where('kda_id',$id)->get();
	// 	$kda = DB::table('kda')->where('id_kda',$id)->leftjoin('unit','kda.unit','=','unit.id_unit')->get();
	// 	//$kda = json_encode($kda);
	// 	//$kda = DB::table('kda')->where('id_kda','$id') ->leftjoin('unit','kda.unit','=','unit.id_unit')->get();
	// 	//return response()->json($kda);
	// 	//return ($temuan);
	// 	$pdf = PDF::loadView('pdf', ['kda' => $kda, 'temuan' => $temuan]);
	// 	return $pdf->download('invoice.pdf');

	// }
// 	public function buatpdf2()
// 	{
// 		$summernotes = DB::table('temuan')->get()->toArray();
// 		print_r($summernotes);
// 		echo "<br><br><br>";
// 		$temuan = DB::table('temuan')->get();
// 		print_r($temuan);
		
// // // Dump array with object-arrays
// // 		dd($arrays);
// 		//$kda = json_encode($kda);
// 		//$kda = DB::table('kda')->where('id_kda','$id') ->leftjoin('unit','kda.unit','=','unit.id_unit')->get();
// 		//return response()->json($kda);
// 		//return ($temuan);

// 		$arr = array(1, 2, 3, 4);
// 		echo "<br><br><br>";
// 		foreach($arr as $value)
// 		{
// 			echo $value;
// 		}
// 		print_r($arr);
// 		echo "<br><br><br>";
// 		foreach ($arr as $key => $value) {
// 			echo "{$key} => {$value} ";
// 		}
// 		print_r($arr);
// 		// $dompdf = PDF::loadView('pdf2', ['summernotes' => $summernotes]);
// 		// $dompdf->render();

// 		// return $dompdf->stream("hello.pdf");
// 		//return $pdf->download('cobasummer.pdf');

// 	}
	public function buatpdf3(){
		$html = '';
		$i =1;
		$summernotes = DB::table('summernotes')->get();
		foreach($summernotes as $summernotes)
		{
			$view = view('pdf2', ['summernotes' => $summernotes]);
			$html = $view->render();
			$pdf = PDF::loadHTML($html);            
			$sheet = $pdf->setPaper('a4', 'potrait');
			$filename = "kda/".$i."coba.pdf";
			//printf($filename);
			$sheet->save($filename);
			// $content = $sheet->output();
			// file_put_contents('filename.pdf', $content);
		    //return $sheet->download($i.'coba.pdf'); 
			$i++;
		}

		//return $sheet->download($i.'coba.pdf'); 
	}
	// public function buatpdf4()
	// {
	// 	$lang_array = array("chi","eng");
	// 	$i = 0;
	// 	foreach($lang_array as $lang)
	// 	{
	// 		$html = "<!DOCTYPE html><html><body>M</body></html>";
	// 		$dompdf = new PDF();
	// 		$dompdf = PDF::loadHTML($html);            
	// 	  //$dompdf->load_html($html);
	// 	  //$dompdf->set_paper("A4", 'portrait');
	// 		$dompdf = PDF::render();
	// 		$output = $dompdf->output();
	// 		unset($dompdf);
	// 		file_put_contents($i.".pdf", $output);
	// 		$i++;
	// 	}
	// }
	public function tgl_indo($tanggal){
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $tanggal);
		
		// variabel pecahkan 0 = tanggal
		// variabel pecahkan 1 = bulan
		// variabel pecahkan 2 = tahun
	 
		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}
	

	public function filepdf($id)
    {
        $kda = DB::table('kda')->where('id_kda',$id)->leftjoin('unit','kda.unit','=','unit.id_unit')->first();
        $data = DB::table('kda_data')->where('kda_id',$id)->first();
        $temuan = DB::table('temuan')->where('kda_id',$id)->get();
        $kda_ket = DB::table('kda_keterangan2')->where('kda_id',$id)->get();
        $ket = DB::table('kda_keterangan')->where('kda_id',$id)->first();
        $bulan = date("m",strtotime($kda->bulan_audit));
        $bulanlalu = date("m",strtotime($kda->masa_audit));
        // $bulanlalu = date("m",strtotime("{$kda->bulan_audit} -1 Month"));
        $tahun = date("y",strtotime($kda->bulan_audit));
        // $tahun = $kda->bulan_audit.getFullYear();
        $namabulan = array(
				                '01' => 'Januari',
				                '02' => 'Februari',
				                '03' => 'Maret',
				                '04' => 'April',
				                '05' => 'Mei',
				                '06' => 'Juni',
				                '07' => 'Juli',
				                '08' => 'Agustus',
				                '09' => 'September',
				                '10' => 'Oktober',
				                '11' => 'November',
				                '12' => 'Desember',
				        );
  
        $pdfnama = $kda->id_kda."-".$kda->nama."-".$kda->bulan_audit.".pdf";
        if ($kda->jenis == 1)
				{
					$summernotes = DB::table('summernotes')->where('id',1)->first();
					$view = view('pdf2', ['summernotes' => $summernotes]);
					$contents = $view->render();

				}
				elseif ($kda->jenis == 2) {
					$summernotes = DB::table('summernotes')->where('id',2) ->first();
					$view = view('pdf2', ['summernotes' => $summernotes]);
					$contents = $view->render();
					//untuk mencatat temuan sebelumnya (belum kondisi yg status 1)
					$semuakda = kda::select('id_kda')->where('unit', $kda->unit)
					->whereRaw(" MONTH(bulan_audit) < {$bulan}  AND YEAR(bulan_audit) =  20{$tahun}")
					->get();
					//dd($semuakda);
					$temuan1 = db::table('temuan')->leftjoin('kda','temuan.kda_id','=','kda.id_kda')->whereIn('kda_id', $semuakda)
					->where('temuan.status',0)
					->orderBy('kda.bulan_audit')->get();
					$temuan2 = json_decode($temuan1);
					$table = '';
					for ($i=1; $i < 13 ; $i++) { 
						$temuanawal = 0;
						foreach ($temuan2 as $key => $value) { 
						$month = date("m",strtotime($value->bulan_audit));
						$bulannama = $namabulan[date("m",strtotime($value->bulan_audit))];
							if ($month == $i) {
								$temuanawal++;
								if ($temuanawal == 1)
								{
									$table .= 'ini bulan '.$bulannama.'<br><br>';
									$table .= '<table class="table table-bordered table-striped">
											<thead>
												<th>Kwitansi</th>
												<th>nominal</th>
												<th>keterangan</th>
											</thead>
											<tbody>
											<tr></tr>
												<tr>
												<td>'.$value->kwitansi.'</td>
												<td>'.$value->nominal.'</td>
												<td>'.$value->keterangan.'</td>
												</tr>';

								}
								else
								{
									$table .= '<tr>
												<td>'.$value->kwitansi.'</td>
												<td>'.$value->nominal.'</td>
												<td>'.$value->keterangan.'</td>
												</tr>';

								}
							}
						
						
						}
						if ($temuanawal != 0) {
							$table .='</tbody>
									</table><br><br>';
						}
					}
					$contents = str_replace("temuanlama$", $table, $contents);
					//akhir untuk mencatat temuan sebelumnya (belum kondisi yg status 1)
					
				}
				elseif ($kda->jenis == 3) {
					$summernotes = DB::table('summernotes')->where('id',3) ->first();
					$view = view('pdf2', ['summernotes' => $summernotes]);
					$contents = $view->render();
					$contents = str_replace("kondisi$", $ket->kondisi, $contents);
					$contents = str_replace("kesimpulan$", $ket->kesimpulan, $contents);
					$contents = str_replace("saran$", $ket->saran, $contents);
					$contents = str_replace("rekomendasi$", $ket->rekomendasi, $contents);
					$contents = str_replace("tanggapan$", $ket->tanggapan, $contents);
				}
				else {
					$summernotes = DB::table('summernotes')->where('id',3) ->first();
					$view = view('pdf2', ['summernotes' => $summernotes]);
					$contents = $view->render();
					$contents = str_replace("kondisi$", $ket->kondisi, $contents);
					$contents = str_replace("kesimpulan$", $ket->kesimpulan, $contents);
					$contents = str_replace("saran$", $ket->saran, $contents);
					$contents = str_replace("rekomendasi$", $ket->rekomendasi, $contents);
					$contents = str_replace("tanggapan$", $ket->tanggapan, $contents);
				}

				$contents = str_replace("unit$", $kda->nama, $contents);
				$contents = str_replace("masaaudit$", "{$namabulan[$bulanlalu]} 20{$tahun}", $contents);
				$contents = str_replace("bulanaudit$", "{$namabulan[$bulan]} 20{$tahun}", $contents);
				$contents = str_replace("bulan$", $namabulan[$bulanlalu], $contents);
				$contents = str_replace("tahun$", "20{$tahun}", $contents);
				$tanggalttd = $this->tgl_indo($kda->bulan_audit);
				$contents = str_replace("tanggalttd$", $tanggalttd, $contents);

				if ($kda_ket == NULL) {
				}
				else{
					//untuk mencatat kda keterangan2
					$list_keterangan='';
					$keterangans = '<table class=="tg">
								<thead>
									<th>Kelengkapan</th>
									<th>Ada/ Tidak Ada</th>
									<th>Jumlah</th>
									<th>Nominal</th>
								</thead>
								<tbody>
								<tr></tr>';
					if ($kda_ket->count() > 0) {
						foreach ($kda_ket as $kda_ket) {
						$list_keterangan .=
									'<tr>
										<td>'.$kda_ket->kelengkapan.'</td>
										<td>'.$kda_ket->kesediaan.'</td>
										<td>'.$kda_ket->jumlah.'</td>
										<td>Rp. '.$kda_ket->nominal.'</td>
									</tr>';
								}
					$keterangans .= $list_keterangan;
					$keterangans .= '</tbody>
							</table>';
					}
					else
					{
						$keterangans .= '<tr>
										<td>-</td>
										<td>-</td>
										<td>-</td>
									</tr></tbody>
							</table>';
					}
					
					$contents = str_replace("kdaketerangan2$", $keterangans, $contents);
					
				}
				//untuk mencatata temuan sekarang
					$list_temuan='';
					$temuansekarang = '<table class="table table-bordered table-striped">
								<thead>
									<th>Kwitansi</th>
									<th>nominal</th>
									<th>keterangan</th>
								</thead>
								<tbody>
								<tr></tr>';
					if ($temuan->count() > 0) {
						foreach ($temuan as $tem) {
						$list_temuan .=
									'<tr>
										<td>'.$tem->kwitansi.'</td>
										<td>'.$tem->nominal.'</td>
										<td>'.$tem->keterangan.'</td>
									</tr>';
								}
					$temuansekarang .= $list_temuan;
					$temuansekarang .= '</tbody>
							</table>';
					}
					else
					{
						$temuansekarang .= '<tr>
										<td>-</td>
										<td>-</td>
										<td>-</td>
									</tr></tbody>
							</table>';
					}
					
					$contents = str_replace("temuan$", $temuansekarang, $contents);
					//akhir untuk mencatata temuan sekarang
			$pdf = PDF::loadHTML($contents);            
			$sheet = $pdf->setPaper('a4', 'potrait');
			//$sheet->save($pdfnama);
			//return $sheet;
			return array($sheet,$pdfnama);
        	//return $sheet->download($pdfnama);
    }
    public function downloadpdf($id)
    {
    	$download = $this->filepdf($id);
    	$file = $download[0];
    	$nama = $download[1];
    	return $file->download($nama);

    }

	public function downloadkda(){
		$files = glob('kda/*');
		Zipper::make('zip/test.zip')->add($files)->close();

		if(file_exists('zip/test.zip')){
		  return response()->download('zip/test.zip');
		}else{
		  dd('File does not exists.');
		}

		//return response()->download('zip/test.zip')->deleteFileAfterSend(true);

	}
	public function laporan()
	{
		$currentMonth = date('m');
		//$periode = 2;
		$periode = array(1,2,3);
		$currentYear = date('y');
		print $currentMonth;
		echo "<br><br><br>";
		print $currentYear;
		echo "<br><br><br>";
		$query = DB::table('kda')->where('id_kda', 2)->first();
		print_r($query);

		echo "<br><br><br>";
		$data = kda::select('id_kda')
		//->whereRaw('MONTH(tanggal) = ?', $currentMonth )
		//->whereRaw("( MONTH(tanggal) = ?, 2 OR MONTH(tanggal) = ?, 3)")
		->whereRaw("MONTH(tanggal) = {$currentMonth} OR MONTH(tanggal) = 3 OR MONTH(tanggal) = 4")
		->get();
		print $data;
	}
	public function laporan2()
	{
		$sesi = 1;
		$currentYear = date('y');
		echo "<br><br><br>";
		print $currentYear;
		//$periode = 2;
		$data = kda::select('id_kda')
		//->whereRaw('MONTH(tanggal) = ?', $currentMonth )
		//->whereRaw("( MONTH(tanggal) = ?, 2 OR MONTH(tanggal) = ?, 3)")
		->whereRaw("(MONTH(tanggal) = {$sesi} OR MONTH(tanggal) = {$sesi}+1 OR MONTH(tanggal) = {$sesi}+2 ) AND YEAR(tanggal) =  2019")
		//->whereRaw('YEAR(tanggal) = ?', 2019 )
		->get();
		print $data;
	}
	public function downloadkdatriwulan()
	{
		$sesi =1;
		$path = "zip/";
		//print $path;
		$zipnama = "triwulan12019.zip";
		$path .= $zipnama;
		//print $path;
		if(file_exists($path)){
		  return response()->download($path);
		}else{
			$data = kda::select('id_kda', 'jenis','tanggal')
			->whereRaw("(MONTH(tanggal) = {$sesi} OR MONTH(tanggal) = {$sesi}+1 OR MONTH(tanggal) = {$sesi}+2 ) AND YEAR(tanggal) =  2019")
			->get();

			foreach ($data as $id) {
				//print $id->id_kda;
				if ($id->jenis == 1)
				{
					$summernotes = DB::table('summernotes')->where('id',1) ->first();
					$view = view('pdf2', ['summernotes' => $summernotes]);
				}
				elseif ($id->jenis == 2) {
					$summernotes = DB::table('summernotes')->where('id',2) ->first();
					$view = view('pdf2', ['summernotes' => $summernotes]);
				}
				elseif ($id->jenis == 3) {
					$summernotes = DB::table('summernotes')->where('id',3) ->first();
					$view = view('pdf2', ['summernotes' => $summernotes]);
				}
				else {
					$summernotes = DB::table('summernotes')->where('id',4) ->first();
					$view = view('pdf2', ['summernotes' => $summernotes]);
				}
				$html = $view->render();
				$pdf = PDF::loadHTML($html);            
				$sheet = $pdf->setPaper('a4', 'potrait');
				$pdfnama = "file_kda/{$id->id_kda}-{$id->tanggal}.pdf";
				//$pdfnama = "file_kda/".$id->id_kda.".pdf";
				$sheet->save($pdfnama);
			}
			$files = glob('file_kda/*');
			Zipper::make($path)->add($files)->close();

			return response()->download($path);
		}

	}
	public function downloadkdatriwulan2($tahun, $sesi)
	{
		if ($sesi ==1) $bulan =1;
		elseif ($sesi ==2) $bulan = 4;
		elseif ($sesi == 3) $bulan = 7;
		else $bulan = 10;

		$path = "zip/";
		//print $path;
		$zipnama = "triwulan_{$sesi}_{$tahun}.zip";
		$path .= $zipnama;
		//print $path;
		if(file_exists($path)){
		  return response()->download($path);
		}else{
			$data = kda::select('id_kda', 'jenis','tanggal')
			->whereRaw("(MONTH(tanggal) = {$bulan} OR MONTH(tanggal) = {$bulan}+1 OR MONTH(tanggal) = {$bulan}+2 ) AND YEAR(tanggal) =  {$tahun}")
			->get();

			foreach ($data as $id) {
				//print $id->id_kda;
				if ($id->jenis == 1)
				{
					$summernotes = DB::table('summernotes')->where('id',1) ->first();
					$view = view('pdf2', ['summernotes' => $summernotes]);
				}
				elseif ($id->jenis == 2) {
					$summernotes = DB::table('summernotes')->where('id',2) ->first();
					$view = view('pdf2', ['summernotes' => $summernotes]);
				}
				elseif ($id->jenis == 3) {
					$summernotes = DB::table('summernotes')->where('id',3) ->first();
					$view = view('pdf2', ['summernotes' => $summernotes]);
				}
				else {
					$summernotes = DB::table('summernotes')->where('id',4) ->first();
					$view = view('pdf2', ['summernotes' => $summernotes]);
				}
				$html = $view->render();
				$pdf = PDF::loadHTML($html);            
				$sheet = $pdf->setPaper('a4', 'potrait');
				$pdfnama = "file_kda/triwulan_{$sesi}_{$tahun}/";
				File::isDirectory($pdfnama) or File::makeDirectory($pdfnama);
				$pdfnama .= "{$id->id_kda}-{$id->tanggal}.pdf";
				$sheet->save($pdfnama);
			}
			$files = glob("file_kda/triwulan_{$sesi}_{$tahun}/*");
			Zipper::make($path)->add($files)->close();

			if(file_exists($path))
			{
				return response()->download($path);

			}
			else
			{
				Session::flash('message', 'Tidak ada data KDA'); 
				Session::flash('alert-class', 'alert-danger');
				return Redirect::back(); 
			}
			

			
		}

	}

	public function downloadkdatriwulanfix($tahun, $sesi)
	{
		if ($sesi ==1) $bulan =1;
		elseif ($sesi ==2) $bulan = 4;
		elseif ($sesi == 3) $bulan = 7;
		else $bulan = 10;

		$path = "zip/";
		$zipnama = "triwulan_{$sesi}_{$tahun}.zip";
		$path .= $zipnama;
		$data = kda::select('id_kda', 'jenis','tanggal')
		->whereRaw("(MONTH(tanggal) = {$bulan} OR MONTH(tanggal) = {$bulan}+1 OR MONTH(tanggal) = {$bulan}+2 ) AND YEAR(tanggal) =  {$tahun}")
		->get();

		foreach ($data as $id) {
			$download = $this->filepdf($id->id_kda);
	    	$file = $download[0];
	    	$nama = $download[1];
			$pdfnama = "file_kda/triwulan_{$sesi}_{$tahun}/";
			File::isDirectory($pdfnama) or File::makeDirectory($pdfnama);
			$pdfnama .= $nama;
			$file->save($pdfnama);
		}
		$files = glob("file_kda/triwulan_{$sesi}_{$tahun}/*");
		Zipper::make($path)->add($files)->close();
		if(file_exists($path))
		{
			return response()->download($path);

		}
		else
		{
			Session::flash('message', 'Tidak ada data KDA'); 
			Session::flash('alert-class', 'alert-danger');
			return Redirect::back(); 
		}
	}


}
