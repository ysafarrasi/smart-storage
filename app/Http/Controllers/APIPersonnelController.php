<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\Tmprfid;
use Illuminate\Http\Request;

class APIPersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function getDataRFID()
    {
        $tmprfid = Tmprfid::orderBy('nokartu', 'asc')->get();
        return response()->json([
            'code' => 200,
            'message' => 'success',
            'data' => $tmprfid
        ]);
    }

    public function getPersonnel()
    {
        // Mengambil semua data personnels dari database
        $personnels = Personnel::orderBy('personnel_id', 'asc')->get();

        // Mengembalikan data dalam format JSON
        return response()->json([
            'code' => 200,
            'message' => 'success',
            'data' => $personnels,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $personnel_id)
    {
        $personnel = Personnel::find($personnel_id);
        if ($personnel) {
            return response()->json([
                'code' => 200,
                'message' => 'data found',
                'data' => $personnel
            ]);
        } else {
            return response()->json([
                'code' => 404,
                'message' => 'data not found'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
