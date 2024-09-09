<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIDashboardController extends Controller
{
    //
    public function index()
    {
        $datapersonnels = DB::table('personnels')->get();
        $datastatus = DB::table('status')->get();

        return response()->json([
            'code' => 200,
            'message' => 'success',
            'data' => [$datapersonnels, $datastatus]
        ]);
    }

    public function show()
    {
        $data = DB::table('personnels')
            ->join('status', 'personnels.loadCellID', '=', 'status.loadCellID')
            ->select('personnels.loadCellID', 'personnels.personnel_id', 'personnels.nama', 'status.tanggal', 'status.time_out', 'status.time_in') // Menampilkan semua kolom dari kedua tabel
            ->get();

        return response()->json([
            'code' => 200,
            'message' => 'success',
            'data' => $data
        ]);
    }
}
