<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tampil-data-biodata', [
            'data' => Biodata::get(),
            'title' => 'Biodata Santri'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $req)
    {
        return view('tambah-data-biodata');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5000',
        ]);
        

        $filename = $request->image->getClientOriginalName();

        $image = $request->image->storeAs('img', $filename);
        
        if (Biodata::where('noinduk_santri', $request->no_induk)->first() === null) {
            return Biodata::insert([
                'nama_santri' => $request->nama_santri,
                'noinduk_santri' => $request->no_induk,
                'tempat_santri' => $request->tempat_santri,
                'tanggal_santri' => $request->tanggal_santri,
                'wali_santri' => $request->wali_santri,
                'alamat_santri' => $request->alamat_santri,
                'tanggal_masuk' => $request->tanggal_masuk,
                'foto_santri' => $image,
                'status' => $request->status,
            ])
                ? redirect('/biodata')->with('sukses', 'Data Santri berhasil ditambah')
                : redirect()->back()->with('gagal', 'Gagal menambahkan data');
        } else {
            return redirect()->back()->with('gagal', 'No induk telah terdaftar');
        }

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
