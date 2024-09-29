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
            // Menggunakan null coalescing operator untuk memberikan nilai default jika $loadCell null
            $statusAbsen = $loadCell->status ?? null;
            $loadCellID = $loadCell->loadCellID ?? null;

            if ($loadCellID) {
                $owner = Personnel::where('loadCellID', $loadCellID)->first();

                if ($owner) {
                    $nama = $owner->nama_pengguna ?? 'Unknown';
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
        $statusData = status::select('status.*', 'personnels.personnel_id', 'personnels.nama')
            ->join('personnels', 'status.loadCellID', '=', 'personnels.loadCellID')
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
