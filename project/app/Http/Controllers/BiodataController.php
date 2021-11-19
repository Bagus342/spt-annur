<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Gabungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'gabungan' => Gabungan::get(),
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

        $image = $request->image->storeAs('img', $request->no_induk.'-'.$filename);
        
        if (Biodata::where('noinduk_santri', $request->no_induk)->first() === null) {
            return Biodata::insert([
                'nama_santri' => $request->nama_santri,
                'noinduk_santri' => $request->no_induk,
                'tempat_santri' => $request->tempat_santri,
                'tanggal_santri' => tanggal($request->tanggal_santri),
                'wali_santri' => $request->wali_santri,
                'alamat_santri' => $request->alamat_santri,
                'tanggal_masuk' => tanggal($request->tanggal_masuk),
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
        return response()->json(['data' => Biodata::where('id_biodata', $id)->first(),]);
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
        $data = Biodata::where('noinduk_santri', $request->no_induk)->first();
            if ($data !== null) {
                if ($data->noinduk_santri === $request->no_induk && $data->id_biodata === (int) $id) {
                    return $this->saveUpdate($request, $id);
                } elseif ($data->id_user !== (int) $id) {
                    return redirect()->back()->with('gagal', 'Nomot induk telah terdaftar');
                } else {
                    return $this->saveUpdate($request, $id);
                }
            } else {
                return $this->saveUpdate($request, $id);
            }
    }

    public function saveUpdate($request, $id) {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:5000',
        ]);
        if ($request->image) {
                $filename = $request->image->getClientOriginalName();
                Storage::delete($request->oldImage);
                $image = $request->image->storeAs('img', $request->no_induk.'-'.$filename);
            return Biodata::where('id_biodata', $id)->update([
                'nama_santri' => $request->nama_santri,
                'noinduk_santri' => $request->no_induk,
                'tempat_santri' => $request->tempat_santri,
                'tanggal_santri' => tanggal($request->tanggal_santri),
                'wali_santri' => $request->wali_santri,
                'alamat_santri' => $request->alamat_santri,
                'tanggal_masuk' => tanggal($request->tanggal_masuk),
                'foto_santri' => $image,
                'status' => $request->status,
                ])
                    ? redirect('/biodata')->with('sukses', 'data berhasil di update')
                    : redirect()->back()->with('gagal', 'data gagal di update');
        } else {
            return Biodata::where('id_biodata', $id)->update([
                'nama_santri' => $request->nama_santri,
                'noinduk_santri' => $request->no_induk,
                'tempat_santri' => $request->tempat_santri,
                'tanggal_santri' => tanggal($request->tanggal_santri),
                'wali_santri' => $request->wali_santri,
                'alamat_santri' => $request->alamat_santri,
                'tanggal_masuk' => tanggal($request->tanggal_masuk),
                'status' => $request->status,
            ])
                ? redirect('/biodata')->with('sukses', 'data berhasil di update')
                : redirect()->back()->with('gagal', 'data gagal di update');
        }
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Biodata::select('foto_santri')->where('id_biodata', $id)->first();
        $no_induk = Biodata::select('noinduk_santri')->where('id_biodata', $id)->first();

        Storage::delete($image->foto_santri);

        return Biodata::where('id_biodata', $id)->delete()
        ? redirect('/biodata')->with('sukses', 'Data berhasil dihapus')
        : redirect()->back()->with('gagal', 'Data gagal dihapus');
    }
}
