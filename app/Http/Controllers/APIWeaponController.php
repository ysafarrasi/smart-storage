<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use Illuminate\Http\Request;

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
}
