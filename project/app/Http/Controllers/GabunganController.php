<?php

namespace App\Http\Controllers;

use App\Models\Gabungan;
use App\Models\Biodata;
use App\Models\Kamar;
use App\Models\Kategori;
use Illuminate\Http\Request;

class GabunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tampil-data-gabungan', [
            'data' => Gabungan::get(),
            'biodata' => Biodata::get(),
            'kamar' => Kamar::get(),
            'kategori' => Kategori::get(),
            'title' => 'Data Gabungan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('tambah-data-gabungan', [
            'biodata' => Biodata::get(),
            'kamar' => Kamar::get(),
            'kategori' => Kategori::get(),
            'title' => 'Tambah Data Gabungan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Gabungan::insert([
            'no_induk' => $request->no_induk,
            'nama_kategori' => $request->nama_kategori,
            'nama_kamar' => $request->nama_kamar,
        ])
            ? redirect('/gabungan')->with('sukses', 'Data gabungan berhasil ditambahkan')
            : redirect()->back()->with('gagal', 'Data gagal ditambahkan');
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
        return response()->json([ 'data' => Gabungan::where('id_gabungan', $id)->first(), 'kamar' => Kamar::get(), 'kategori' => Kategori::get(), 'biodata' => Biodata::get() ]);
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
        $data = Gabungan::where('id_gabungan', $request->id_gabungan)->first();
            if ($data !== null) {
                if ($data->no_induk === $request->no_induk && $data->id_gabungan === (int) $id) {
                    return $this->saveUpdate($request, $id);
                } elseif ($data->id_user !== (int) $id) {
                    return redirect()->back()->with('gagal', 'Nama gabungan telah terdaftar');
                } else {
                    return $this->saveUpdate($request, $id);
                }
            } else {
                return $this->saveUpdate($request, $id);
            }
    }

    public function saveUpdate($request, $id) {
        return Gabungan::where('id_gabungan', $id)->update([
            'no_induk' => $request->no_induk,
            'nama_kamar' => $request->nama_kamar,
            'nama_kategori' => $request->nama_kategori,
        ])
            ? redirect('/gabungan')->with('sukses', 'data berhasil di update')
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
        return Gabungan::where('id_gabungan', $id)->delete()
        ? redirect('/gabungan')->with('sukses', 'Data berhasil diupdate')
        : redirect()->back()->with('gagal', 'Data gagal diupdate');
    }
}
