<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Status;
use App\Models\Weapon;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $loadCells = Weapon::all();
        $statuses = [];

        foreach ($loadCells as $loadCell) {
            if ($loadCell) {
                $statusAbsen = $loadCell->status;
                $loadCellID = $loadCell->loadCellID;

                $owner = Personnel::where('loadCellID', $loadCellID)->first();

                if ($owner) {
                    $nama = $owner->nama_pengguna;
                    $tanggal = Carbon::now('Asia/Jakarta')->format('Y-m-d');
                    $jam = Carbon::now('Asia/Jakarta')->format('H:i:s');
                    $status = Status::where('loadCellID', $loadCellID)->where('tanggal', $tanggal)->first();

                    if ($statusAbsen == -1 && !$status) {
                        Status::create([
                            'loadCellID' => $loadCellID,
                            'tanggal' => $tanggal,
                            'time_out' => $jam,
                        ]);
                    } elseif ($statusAbsen == 1 && $status) {
                        $status->update([
                            'time_in' => $jam,
                            'duration' => gmdate('H:i:s', Carbon::parse($jam, 'Asia/Jakarta')->diffInSeconds(Carbon::parse($status->time_out, 'Asia/Jakarta'))),
                        ]);
                    }

                    $statuses[] = $status;
                }
            }
        }

        return view('dashboard', compact('statuses'));
    }

    public function showDATAHome()
    {
        $date = Carbon::now()->format('Y-m-d');

        $status = Status::join('personnels', 'status.loadCellID', '=', 'personnels.loadCellID')
            ->where('status.tanggal', $date)
            ->select('status.*', 'personnels.personnel_id', 'personnels.nama')
            ->get();

        return view('dashboard', compact('status'));
    }


    public function getDashboard()
    {
        $statuses = Status::with('personnel')->get();
        return response()->json($statuses);
    }
}
