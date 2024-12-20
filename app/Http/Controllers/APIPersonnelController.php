<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Tmprfid;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class APIPersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function PersonnelData()
    {
        $personnel = Personnel::all();
        return response()->json([
            'code' => 200,
            'message' => 'success',
            'data' => $personnel
        ]);
    }

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
        try {
            // Menggunakan caching dan pagination untuk mengurangi beban
            $personnel = Cache::remember('personnel_data', 60, function () {
                return Personnel::paginate(10);
            });
            return response()->json(['data' => $personnel], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching personnel data: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch personnel data'], 500);
        }
    }

    // public function postPersonnelData(Request $request)
    // {
    //     // Buat client Guzzle
    //     $client = new Client();

    //     // Buat request ke API `rfid-data`
    //     $response = $client->get('http://localhost:8000/api/rfid-data');

    //     // Ambil data dari response
    //     $data = json_decode($response->getBody(), true);

    //     // Ambil nokartu dari data
    //     $nokartu = $data['data'][0]['nokartu']; // Sesuaikan dengan struktur data yang dikembalikan oleh API

    //     // Simpan data ke database
    //     $dataPersonnel = new Personnel();
    //     $dataPersonnel->nokartu = $request->nokartu;
    //     $dataPersonnel->loadCellID = $request->loadCellID;
    //     $dataPersonnel->personnel_id = $request->personnel_id;
    //     $dataPersonnel->nama = $request->nama;
    //     $dataPersonnel->pangkat = $request->pangkat;
    //     $dataPersonnel->nrp = $request->nrp;
    //     $dataPersonnel->jabatan = $request->jabatan;
    //     $dataPersonnel->kesatuan = $request->kesatuan;

    //     $dataPersonnel->save();

    //     return response()->json([
    //         'code' => 200,
    //         'message' => 'success',
    //         'data' => $dataPersonnel
    //     ]);
    // }
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
        $request->validate([
            'nokartu' => 'required|unique:personnel,nokartu',
            'loadCellID' => 'required',
            'personnel_id' => 'required|unique:personnel,personnel_id',
            'nama' => 'required',
            'pangkat' => 'required',
            'nrp' => 'required',
            'jabatan' => 'required',
            'kesatuan' => 'required'
        ]);

        try {
            $personnel = new Personnel();
            $personnel->nokartu = $request->nokartu;
            $personnel->loadCellID = $request->loadCellID;
            $personnel->personnel_id = $request->personnel_id;
            $personnel->nama = $request->nama;
            $personnel->pangkat = $request->pangkat;
            $personnel->nrp = $request->nrp;
            $personnel->jabatan = $request->jabatan;
            $personnel->kesatuan = $request->kesatuan;
            $personnel->save();

            return response()->json([
                'code' => 201,
                'message' => 'data created successfully',
                'data' => $personnel
            ]);
        } catch (\Exception $e) {
            Log::error('Error storing personnel data: ' . $e->getMessage());
            return response()->json([
                'code' => 500,
                'message' => 'Failed to store data'
            ], 500);
        }
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
        $personnel = Personnel::find($id);
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nokartu' => 'required|unique:personnel,nokartu',
            'loadCellID' => 'required',
            'personnel_id' => 'required|unique:personnel,personnel_id',
            'nama' => 'required',
            'pangkat' => 'required',
            'nrp' => 'required',
            'jabatan' => 'required',
            'kesatuan' => 'required'
        ]);

        $personnel = Personnel::find($id);
        if ($personnel) {
            $personnel->nokartu = $request->nokartu;
            $personnel->loadCellID = $request->loadCellID;
            $personnel->personnel_id = $request->personnel_id;
            $personnel->nama = $request->nama;
            $personnel->pangkat = $request->pangkat;
            $personnel->nrp = $request->nrp;
            $personnel->jabatan = $request->jabatan;
            $personnel->kesatuan = $request->kesatuan;
            $personnel->save();

            return response()->json([
                'code' => 201,
                'message' => 'data updated successfully',
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $personnel = Personnel::find($id);
        if ($personnel) {
            $personnel->delete();
            return response()->json([
                'code' => 200,
                'message' => 'data deleted successfully'
            ]);
        } else {
            return response()->json([
                'code' => 404,
                'message' => 'data not found'
            ]);
        }
    }
}

