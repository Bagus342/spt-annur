<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Display a listing of the resource.
     *
     * @param id
     */
    public function getUser($id)
    {
        //
        $user = User::where('username', $id)->first();

        return ['status' => 'ok', 'data' => $user];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request
     */
    public function Login(Request $req)
    {
        //
        $user = $req->username;
        $validate = $this->getUser($req->username);

        if ($validate['data'] == null) {
            return redirect()->back()->with('gagal', 'username salah / tidak terdaftar');
        }

        $this->createSession($req, $validate['data']);

        return password_verify($req->password, $validate['data']['password'])
            ? redirect('/biodata')
            : redirect()->back()->with('gagal', 'password salah');
    }

    public function createSession($req, $validate)
    {
        $req->session()->put('username', $validate['username']);
        $req->session()->put('user_id', $validate['id_user']);
        $req->session()->put('name', $validate['nama_user']);
        $req->session()->put('role', $validate['level']);
    }

    public function Logout()
    {
        if (session()->has('username')) {
            session()->pull('name');
            session()->pull('username');
            session()->pull('user_id');
            session()->pull('role');
        }
        return redirect('/');
    }
}
