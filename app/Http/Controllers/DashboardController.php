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
        return view('/dashboard');
    }

    public function showDATAHome()
    {
        $date = Carbon::now()->format('Y-m-d');

        $status = Status::join('personnel', 'status.loadCellID', '=', 'personnel.loadCellID')
            ->where('status.tanggal', $date)
            ->select('status.*', 'personnel.personnel_id', 'personnel.nama')
            ->get();

        return view('/dashboard', compact('status'));
    }

    public function LoadStatusHome()
    {
        $loadCells = Weapon::all();

        foreach ($loadCells as $dataLoadCell) {
            $statusAbsen = $dataLoadCell->status;
            $idSenjata = $dataLoadCell->loadCellID;

            $mode = ($statusAbsen == 1) ? "time_in" : "time_out";

            $jumlah_data = Personnel::where('loadCellID', $idSenjata)->count();

            if ($jumlah_data > 0 && $statusAbsen !== "") {
                $data_karyawan = Personnel::where('loadCellID', $idSenjata)->first();
                $nama = $data_karyawan->nama;

                $tanggal = now()->format('Y-m-d');
                $jam = now()->format('H:i:s');

                $jumlah_absen = status::where('loadCellID', $idSenjata)->where('tanggal', $tanggal)->count();

                if ($statusAbsen == 0 && $jumlah_absen == 0) {
                    status::create([
                        'loadCellID' => $idSenjata,
                        'tanggal' => $tanggal,
                        'time_out' => $jam,
                    ]);
                } elseif ($statusAbsen == 1 && $jumlah_absen > 0) {
                    status::where('loadCellID', $idSenjata)
                        ->where('tanggal', $tanggal)
                        ->whereNull('duration')
                        ->update([
                            'time_in' => $jam,
                            'duration' => DB::raw("TIMEDIFF('$jam', time_out)"),
                        ]);
                }
            }
        }

        $tanggal = now()->format('Y-m-d');
        $statusData = status::select('status.*', 'personnel.personnel_id', 'personnel.nama')
            ->join('personnel', 'status.loadCellID', '=', 'personnel.loadCellID')
            ->where('status.tanggal', $tanggal)
            ->get();

        $no = 0;
        $output = "";

        foreach ($statusData as $row) {
            $no++;
            $output .= "<tr>";
            $output .= "<td>" . $no . "</td>";
            $output .= "<td>" . $row->loadCellID . "</td>";
            $output .= "<td>" . $row->personnel_id . "</td>";
            $output .= "<td>" . $row->nama . "</td>";
            $output .= "<td>" . $row->tanggal . "</td>";
            $output .= "<td>" . $row->time_out . "</td>";
            $output .= "<td>" . $row->time_in . "</td>";
            $output .= "</tr>";
        }
        return $output;
    }
}
