<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Gabungan;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tampil-data-kamar', [
            'data' => Kamar::get(),
            'gabungan' => Gabungan::get(),
            'title' => 'Data Kamar Santri'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        //
        return view('tambah-data-kamar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Kamar::insert([
            'nama_kamar' => $request->nama_kamar,
            'nama_kepala_kamar' => $request->kepala_kamar,
        ])
            ? redirect('/kamar')->with('sukses', 'Data kamar berhasil ditambah')
            : redirect()->back()->with('gagal', 'Gagal menambahkan data');
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
        return response()->json(['data' => Kamar::where('id_kamar', $id)->first(),]);
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
        $data = Kamar::where('nama_kamar', $request->nama_kamar)->first();
            if ($data !== null) {
                if ($data->nama_kamar === $request->nama_kamar && $data->id_kamar === (int) $id) {
                    return $this->saveUpdate($request, $id);
                } elseif ($data->id_user !== (int) $id) {
                    return redirect()->back()->with('gagal', 'Nama kamar telah terdaftar');
                } else {
                    return $this->saveUpdate($request, $id);
                }
            } else {
                return $this->saveUpdate($request, $id);
            }
    }

    public function saveUpdate($request, $id) {
        return Kamar::where('id_kamar', $id)->update([
            'nama_kamar' => $request->nama_kamar,
            'nama_kepala_kamar' => $request->kepala_kamar,
        ])
            ? redirect('/kamar')->with('sukses', 'data berhasil di update')
            : redirect()->back()->with('gagal', 'data gagal di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Kamar::where('id_kamar', $id)->delete()
        ? redirect('/kamar')->with('sukses', 'Data berhasil dihapus')
        : redirect()->back()->with('gagal', 'Data gagal dihapus');
    }
}
