<?php

namespace App\Http\Controllers;

use App\Aktiviti;
use App\MultipleFile;
use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Facades\Auth;

class AktivitisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aktivitis = Aktiviti::with('user')->paginate(5);
        return view('aktiviti.index',compact('aktivitis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $aktivitis = Aktiviti::with('user');
        return view('aktiviti.create',compact('aktivitis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, ['namaKelab' => 'required',]);
        $this->validate($request, ['namaAktiviti' => 'required',]);
        $this->validate($request, ['tempat' => 'required',]);
        $this->validate($request, ['tarikhAktiviti' => 'required',]);
        $this->validate($request, ['peringkat' => 'required',]);
        $this->validate($request, ['pencapaian' => 'required',]);
        $this->validate($request, ['jawatankuasa' => 'required',]);


        $aktiviti = new Aktiviti;
        $aktiviti->namaKelab = $request->namaKelab;
        $aktiviti->namaAktiviti = $request->namaAktiviti;
        $aktiviti->tempat = $request->tempat;
        $aktiviti->tarikhAktiviti = $request->tarikhAktiviti;
        $aktiviti->peringkat = $request->peringkat;
        $aktiviti->pencapaian = $request->pencapaian;
        $aktiviti->jawatankuasa = $request->jawatankuasa;

        $aktiviti->user_id = Auth::user()->id;

        $aktiviti->save();
        // upload file
        if ($request->hasFile('images')) 
        {
            $loop = count($request->images) - 1;
            foreach(range(0, $loop) as $index) {
                $img = '/images/aktiviti_image_' . time() . (($index+1)*10) . '.' . $request->images[$index]->getClientOriginalExtension();
                $request->images[$index]->move(public_path('images/'), $img);

                $aktiviti_image = new MultipleFile;
                $aktiviti_image->aktiviti_id = $aktiviti->id;
                $aktiviti_image->image_path = $img;
                $aktiviti_image->save();
            }
        }
        
        return redirect()->action('AktivitisController@store')->withMessage('Maklumat anda sedang diproses');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aktiviti = Aktiviti::with('MultipleFile')->findOrFail($id);
        return view('aktiviti.edit', compact('aktiviti'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['namaKelab' => 'required',]);
        $this->validate($request, ['namaAktiviti' => 'required',]);
        $this->validate($request, ['tempat' => 'required',]);
        $this->validate($request, ['tarikhAktiviti' => 'required',]);
        $this->validate($request, ['peringkat' => 'required',]);
        $this->validate($request, ['pencapaian' => 'required',]);
        $this->validate($request, ['jawatankuasa' => 'required',]);
        
        $aktiviti = Aktiviti::findOrFail($id);
        $aktiviti->namaKelab = $request->namaKelab;
        $aktiviti->namaAktiviti = $request->namaAktiviti;
        $aktiviti->tempat = $request->tempat;
        $aktiviti->tarikhAktiviti = $request->tarikhAktiviti;
        $aktiviti->peringkat = $request->peringkat;
        $aktiviti->pencapaian = $request->pencapaian;
        $aktiviti->jawatankuasa = $request->jawatankuasa;
        $aktiviti->user_id = Auth::user()->id;
        $aktiviti->save();


        if ($request->hasFile('images')) 
        {

            $loop = count($request->images) - 1;
            foreach(range(0, $loop) as $index) {
                $img = '/images/aktiviti_image_' . time() . (($index+1)*10) . '.' . $request->images[$index]->getClientOriginalExtension();
                $request->images[$index]->move(public_path('images/'), $img);
                $aktiviti_image = new MultipleFile;
                $aktiviti_image->aktiviti_id = $aktiviti->id;
                $aktiviti_image->image_path = $img;
                $aktiviti_image->save();
            }
        }
        
        return redirect()->action('AktivitisController@index')->withMessage('Maklumat anda telah berjaya dikemaskini');
    }

    // status
    public function completed(Request $request)
    {
        if($request->completed == false)
            {
                $request->completed = true;
                $request->update(['completed' -> $request->completed]);
                return redirect()->action('AktivitisController@index')->withMessage('Maklumat anda telah diluluskan');
            }
            else
            {
                $request->completed = false;
                $request->update(['completed' -> $request->completed]);
                return redirect()->action('AktivitisController@index')->withMessage('Maklumat anda sedang diproses');
            }
    }

    // public function upload(Request $request, $id)
    // {
    //     // Check if request has a file
    //     if ($request->hasFile('file')) {
    //     $files = $request->file('file');
        
    //     foreach ($files as $file) {
    //         Storage::put($file->getClientOriginal(), file_get_contents($file));
    //     }

    //     return response()->json([
    //         'message' => 'Upload files successful.'
    //     ], 200);

    //         return \Response::json(array('success' =>true));
    //     }

    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aktiviti = Aktiviti::findOrFail($id);
        $aktiviti->delete();
        return back()->withError('Maklumat anda telah berjaya dipadam');
    }

    public function destroyImage ($id)
    {
        $Multiple = MultipleFile::findOrFail($id);
        $Multiple->delete();
        return back()->withError('Gambar telah berjaya dipadam.');
    }
}
