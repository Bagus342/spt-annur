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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
