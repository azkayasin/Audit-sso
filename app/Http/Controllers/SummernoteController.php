<?php

namespace App\Http\Controllers;

use App\Summernote;
use Illuminate\Http\Request;
use DB;

class SummernoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $summernote = DB::table('summernotes')->where('id', 4)->get();
        //return $summernote;
        return view('summernote',compact('summernote'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipe= $request->tipe;
        $detail=$request->summernoteInput;
        
        $dom = new \domdocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getelementsbytagname('img');
        
        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
        foreach($images as $k => $img){
            $data = $img->getattribute('src');
            
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            
            $data = base64_decode($data);
            $image_name= time().$k.'.png';
            $path = public_path() .'/'. $image_name;
            
            file_put_contents($path, $data);
            
            $img->removeattribute('src');
            $img->setattribute('src', $image_name);
        }
        
        $detail = $dom->savehtml();
        $summernote = new Summernote;
        $summernote->tipe = $tipe;
        $summernote->content = $detail;
        $summernote->save();
        return redirect('/summernote_display');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Summernote  $summernote
     * @return \Illuminate\Http\Response
     */
    public function show(Summernote $summernote)
    {
        $summernote = DB::table('summernotes')->get();
        //return $summernote;
        return view('summernote_display',compact('summernote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Summernote  $summernote
     * @return \Illuminate\Http\Response
     */
    public function edit(Summernote $summernote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Summernote  $summernote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Summernote $summernote)
    {

        $summernote->tipe = $request->tipe;
        $summernote->content = $request->konten;
        $summernote->save();
        return redirect('summernote');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Summernote  $summernote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Summernote $summernote)
    {
        //
    }
    public function pilihtemplate(Request $request)
    {
        $id = $request->input('id');
        $summernote = DB::table('summernotes')->where('id', $id)->first();

        return response()->json($summernote);
        //return $summernote;
    }
}
