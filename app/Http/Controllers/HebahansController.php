<?php

namespace App\Http\Controllers;

use App\Hebahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HebahansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hebahans = Hebahan::with('user')->paginate(5);
        return view('hebahan.index',compact('hebahans'));
    }

    public function papar()
    {
        $hebahans = Hebahan::with('user')->paginate(5);
        return view('hebahan.papar',compact('hebahans'));
    }

    public function detail()
    {
        $hebahans = Hebahan::with('user')->paginate(5);
        return view('hebahan.detail',compact('hebahans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hebahan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, ['tajukAktiviti' => 'required',]);
        $this->validate($request, ['maklumatAktiviti' => 'required',]);

        $hebahan = new Hebahan;
        $hebahan->tajukAktiviti = $request->tajukAktiviti;
        $hebahan->maklumatAktiviti = $request->maklumatAktiviti;
        $hebahan->user_id = Auth::user()->id;
        $hebahan->save();
        
        return redirect()->action('HebahansController@store')->withMessage('Hebahan aktiviti anda diterima');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $hebahan = Hebahan::findOrFail($id);
        return view('hebahan.detail', compact('hebahan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hebahan = Hebahan::findOrFail($id);
        return view('hebahan.edit', compact('hebahan'));
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
        $this->validate($request, ['tajukAktiviti' => 'required',]);
        $this->validate($request, ['maklumatAktiviti' => 'required',]);

        $hebahan = Hebahan::findOrFail($id);
        $hebahan->tajukAktiviti = $request->tajukAktiviti;
        $hebahan->maklumatAktiviti = $request->maklumatAktiviti;
        $hebahan->save();

        return redirect()->action('HebahansController@index')->withMessage('Hebahan aktiviti anda telah berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hebahan = Hebahan::findOrFail($id);
        $hebahan->delete();
        return back()->withError('Hebahan aktiviti anda telah berjaya dipadam');
    }
}
