<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use App\Models\Tmprfid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArduinoController extends Controller
{
    public function postLoadCellData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'slaveNumber' => 'required',
            'status' => 'required',
            'weight' => 'required',
            'loadCellID' => 'required',
            'rackNumber' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => 400,
                'error' => 'Parameter tidak lengkap. Slave number, status, weight, loadCellID, dan rackNumber diperlukan.'
            ]);
        }

        $data = $request->only('slaveNumber', 'status', 'weight', 'loadCellID', 'rackNumber');

        $loadCell = Weapon::where('loadCellID', $data['loadCellID'])->first();

        if ($loadCell) {
            // If loadCellID exists, update status and weight
            $loadCell->status = $data['status'];
            $loadCell->weight = $data['weight'];
            $loadCell->save();
            return response()->json([
                'message' => 'Data berhasil diperbarui di dalam database.'
            ]);
        } else {
            // If loadCellID doesn't exist, insert new data
            Weapon::create($data);
            return response()->json([
                'code' => 200,
                'message' => 'success',
                'data' => $data
            ]);
        }
    }

    public function postRFIDData(Request $request)
    {
        if ($request->has('nokartu')) {
            $nokartu = $request->input('nokartu');
            Tmprfid::truncate();
            // simpan no kartu yang baru ke tabel tmprfid
            $rfid = new Tmprfid();
            $rfid->nokartu = $nokartu;
            $rfid->save();
            return response()->json([
                'code' => 200,
                'message' => 'success',
                'data' => $nokartu
            ]);
        } else {
            return response()->json([
                'code' => 400,
                'error' => 'Parameter tidak lengkap. RFID diperlukan.'
            ]);
        }
    }
}
