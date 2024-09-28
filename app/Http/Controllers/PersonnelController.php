<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use App\Models\Tmprfid;
use GuzzleHttp\Client;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Console\View\Components\Warn;


class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personnel = Personnel::all();
        $weapon = Weapon::select('loadCellID')->get();
        return view('/personnel',compact('personnel'), compact('weapon'));
    }

    public function fetchPersonnel()
    {
        $response = Http::get('http://localhost:8000/api/personnel-data');

        // Jika ada masalah dengan response, atau API tidak berhasil diakses
        if ($response->failed()) {
            return response()->json(['message' => 'Failed to retrieve personnel data'], 500);
        }

        // Ambil data personnel
        $data = $response->json()['data'] ?? [];

        // Mengembalikan data sebagai JSON response
        return response()->json($data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = new Client();
        $url = "http://localhost:8000/api/rfid-data";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'] ?? [];

        $weapon = Weapon::select('loadCellID')->get();

        return view('personnel', compact('data', 'weapon'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'personnel_id' => 'required|unique:personnels',
            'loadCellID' => 'required|exists:weapons,loadCellID',
            'nokartu' => 'required',
            'nama' => 'required',
            'pangkat' => 'required',
            'nrp' => 'required',
            'jabatan' => 'required',
            'kesatuan' => 'required',
        ]);

        $personnel = Personnel::create($request->only([
            'personnel_id',
            'loadCellID',
            'nokartu',
            'nama',
            'pangkat',
            'nrp',
            'jabatan',
            'kesatuan',
        ]));
        

        return redirect()->route('personnel',compact($personnel))->with('success', 'Data berhasil disimpan', );
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $personnel = Personnel::find($id); // Misalnya mengambil data dari model Personnel
        $weapon = Weapon::select('loadCellID')->get(); 
        return view('webpage.personnel', compact('personnel'), compact('weapon'), );
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit( $id)
{
    $personnel = Personnel::find($id); // Pastikan data ditemukan
    $weapon = Weapon::select('loadCellID')->get(); 
    if (!$personnel) {
        abort(404); // Jika tidak ditemukan, tampilkan error 404
    }
    return view('webpage.personnel-edit', compact('personnel'), compact('weapon'), );
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
        $personnel = Personnel::where('personnel_id', $id)->first();

        if ($personnel) {
            $personnel->delete();
            return redirect()->route('personnel')->with('success', 'Data berhasil dihapus');
        }

        return redirect()->route('webpage.personnel-delete',compact($personnel))->with('error', 'Data tidak ditemukan');
    }
}
