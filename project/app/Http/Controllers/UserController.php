<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tampil-data-user', [
            'data' => User::get(),
            'title' => 'Data User'
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
        return view('tambah-data-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (User::where('username', $request->username)->first() === null) {
            return User::insert([
                'nama_user' => $request->nama_user,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'level' => $request->level,
                'tanggal_masuk' => tanggal($request->tgl_masuk),
            ])
                ? redirect('/user')->with('sukses', 'Data Santri berhasil ditambah')
                : redirect()->back()->with('gagal', 'Gagal menambahkan data');
        } else {
            return redirect()->back()->with('gagal', 'Username telah terdaftar');
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
        return response()->json([ 'data' => User::where('id_user', $id)->first() ]);
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
        $data = User::where('username', $request->username)->first();
        if ($data !== null) {
            if ($data->username === $request->username && $data->id_user === (int) $id) {
                return $this->saveUpdate($request, $id);
            } elseif ($data->id_user !== (int) $id) {
                return redirect()->back()->with('gagal', 'username telah dipakai');
            } else {
                return $this->saveUpdate($request, $id);
            }
        } else {
            return $this->saveUpdate($request, $id);
        }
    }

    public function saveUpdate($request, $id)
    {
        return User::where('id_user', $id)->update([
            'nama_user' => $request->nama_user,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'level' => $request->level,
            'tanggal_masuk' => tanggal($request->tgl_masuk),
        ])
            ? redirect('/user')->with('sukses', 'data berhasil di update')
            : redirect()->back()->with('error', 'data gagal di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return User::where('id_user', $id)->delete()
        ? redirect('/user')->with('sukses', 'Data berhasil dihapus')
        : redirect()->back()->with('gagal', 'Data gagal dihapus');
    }
}
