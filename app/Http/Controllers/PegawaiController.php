<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Jabatan;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtPegawai = Pegawai::with('jabatan')->latest()->paginate(10);//with jabatan adalah relasi tabel
        return view('Pegawai.Data-pegawai', compact('dtPegawai'));
    }

     public function cetakPegawai()
    {
        $dtCetakPegawai = Pegawai::with('jabatan')->get();//with jabatan adalah relasi tabel
        return view('Pegawai.Cetak-pegawai', compact('dtCetakPegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jab = Jabatan::all();//with jabatan adalah relasi tabel
        return view('Pegawai.Create-pegawai', compact('jab'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        Pegawai::create([
            'nama' => $request->nama,
            'jabatan_id' => $request->jabatan_id,
            'alamat' => $request->alamat,
            'tgllhr' => $request->tgllhr,
        ]);

        return redirect('data-pegawai')->with('success', 'Data Berhasil Tersimpan!');
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
        $jab = Jabatan::all();//with jabatan adalah relasi tabel
        $peg = Pegawai::with('jabatan')->findorfail($id);
        return view('Pegawai.Edit-pegawai',compact('peg','jab'));
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
        $peg = Pegawai::findorfail($id);
        $peg->update($request->all());
        return redirect('data-pegawai')->with('success', 'Data Berhasil Diupdate!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peg = Pegawai::findorfail($id);
        $peg->delete();
        return back()->with('info', 'Data Berhasil Dihapus!');

        

    }

    public function cetakForm()
    {
        return view('Pegawai.Cetak-pegawai-form');
    }

    public function cetakPegawaiPertanggal($tglawal, $tglakhir)
    {
       // dd($tglawal, $tglakhir);
        $cetakPertanggal = Pegawai::with('jabatan')->whereBetween('tgllhr', [$tglawal, $tglakhir])->latest()->get();
        return view('Pegawai.Cetak-pegawai-pertanggal', compact('cetakPertanggal'));
    }
}
