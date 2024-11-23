<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIWeaponController extends Controller
{
    public function getDataWeapon(Request $request)
    {
        $weapon = Weapon::orderBy('loadCellID', 'asc')
            ->select('loadCellID', 'rackNumber', 'status', 'weight')
            ->get();
        return response()->json([
            'code' => 200,
            'message' => 'success',
            'data' => $weapon
        ]);
    }

    public function filterDataWeapon(string $loadCellID)
    {
        $weapon = Weapon::find($loadCellID);
        if ($weapon) {
            return response()->json([
                'code' => 200,
                'message' => 'data found',
                'data' => $weapon
            ]);
        } else {
            return response()->json([
                'code' => 404,
                'message' => 'data not found'
            ]);
        }
    }

    public function getLoadCells()
    {
        $loadCells = DB::table('weapons')->distinct()->pluck('loadCellID');
        return response()->json([
            'code' => 200,
            'data' => $loadCells
        ]);
    }

    public function checkLoadCell($loadCellID)
    {
        $isUsed = Personnel::where('loadCellID', $loadCellID)->exists();
        return response()->json([
            'isUsed' => $isUsed
        ]);
    }


}

