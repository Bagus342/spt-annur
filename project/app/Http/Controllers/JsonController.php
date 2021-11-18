<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Kamar;
use App\Models\Kategori;
use App\Models\Gabungan;
use Illuminate\Http\Request;

class JsonController extends Controller
{
    public function getBiodata() {
        $id = request('id');
        $data = Biodata::where('id_biodata', $id)->first();
        return response()->json(['data' => $data]);
    }
}
