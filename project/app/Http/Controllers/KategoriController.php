<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Gabungan;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tampil-data-kategori', [
            'data' => Kategori::get(),
            'gabungan' => Gabungan::get(),
            'title' => 'Data Kategori',
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
        return view('tambah-data-kategori');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uang_makan = explode('Rp. ', $request->uang_makan);
        $uang_infaq = explode('Rp. ', $request->uang_infaq);
        $uang_kesehatan = explode('Rp. ', $request->uang_kesehatan);
        $uang_tabungan = explode('Rp. ', $request->uang_tabungan);
        $uang_tambahan = explode('Rp. ', $request->uang_tambahan);
        return Kategori::insert([
            'nama_kategori' => $request->nama_kategori,
            'uang_makan' => str_replace('.', '', $uang_makan[1]),
            'uang_infaq' => str_replace('.', '', $uang_infaq[1]),
            'uang_kesehatan' => str_replace('.', '', $uang_kesehatan[1]),
            'uang_tabungan' => str_replace('.', '', $uang_tabungan[1]),
            'uang_tambahan' => str_replace('.', '', $uang_tambahan[1]),
        ])
                ? redirect('/kategori')->with('sukses', 'Data kategori berhasil ditambah')
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
        return response()->json([ 'data' => Kategori::where('id_kategori', $id)->first() ]);
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
        $data = Kategori::where('nama_kategori', $request->nama_kategori)->first();
            if ($data !== null) {
                if ($data->nama_kategori === $request->nama_kategori && $data->id_kategori === (int) $id) {
                    return $this->saveUpdate($request, $id);
                } elseif ($data->id_user !== (int) $id) {
                    return redirect()->back()->with('gagal', 'Nama kategori telah terdaftar');
                } else {
                    return $this->saveUpdate($request, $id);
                }
            } else {
                return $this->saveUpdate($request, $id);
            }
    }

    public function saveUpdate($request, $id) {
        $uang_makan = explode('Rp. ', $request->uang_makan);
        $uang_infaq = explode('Rp. ', $request->uang_infaq);
        $uang_kesehatan = explode('Rp. ', $request->uang_kesehatan);
        $uang_tabungan = explode('Rp. ', $request->uang_tabungan);
        $uang_tambahan = explode('Rp. ', $request->uang_tambahan);
        return Kategori::where('id_kategori', $id)->update([
            'nama_kategori' => $request->nama_kategori,
            'uang_makan' => str_replace('.', '', $uang_makan[1]),
            'uang_infaq' => str_replace('.', '', $uang_infaq[1]),
            'uang_kesehatan' => str_replace('.', '', $uang_kesehatan[1]),
            'uang_tabungan' => str_replace('.', '', $uang_tabungan[1]),
            'uang_tambahan' => str_replace('.', '', $uang_tambahan[1]),
        ])
            ? redirect('/kategori')->with('sukses', 'data berhasil di update')
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
        return Kategori::where('id_kategori', $id)->delete()
        ? redirect('/kategori')->with('sukses', 'Data berhasil dihapus')
        : redirect()->back()->with('gagal', 'Data gagal dihapus');
    }
}
