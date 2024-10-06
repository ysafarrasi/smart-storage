<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIDashboardController extends Controller
{
    public function index()
    {
        $datapersonnel = DB::table('personnel')->get();
        $datastatus = DB::table('status')->get();

        return response()->json([
            'code' => 200,
            'message' => 'success',
            'data' => [$datapersonnel, $datastatus]
        ]);
    }
    public function show()
    {
        $data = DB::table('personnel')
            ->join('status', 'personnels.id_senjata', '=', 'status.id_senjata')
            ->select('personnels.id_senjata', 'personnels.id_pengguna', 'personnels.nama_pengguna', 'status.tanggal', 'status.keluar', 'status.masuk') // Menampilkan semua kolom dari kedua tabel
            ->get();

        return response()->json([
            'code' => 200,
            'message' => 'success',
            'data' => $data
        ]);
    }
}
