<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use App\Models\Tmprfid;
use App\Models\Personnel;
use App\Models\Weapon;
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
        return view('/personnel', compact('personnel'), compact('weapon'));
    }

    public function fetchPersonnel()
    {
        try {
            $response = Http::get('http://192.168.1.10:8000/api/personnel-data');
            $data = $response->json()['data'] ?? [];

            return response()->json($data);
        } catch (\Exception $e) {
            Log::error('Error fetching personnel data: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch personnel data'], 500);
        }
    }

    public function create()
    {
        // Menampilkan tampilan form personnel-add
        return view('webpage.personnel-add');
    }


    /**
     * Store a newly created resource in storage.
     */


        public function store(Request $request)
        {
            $request->validate([
                'nokartu' => 'required|string',
                'personnel_id' => 'required|string|unique:personnels,personnel_id',
                'nama' => 'required|string',
                'pangkat' => 'required|string',
                'nrp' => 'required|string|unique:personnels,nrp',
                'jabatan' => 'required|string',
                'kesatuan' => 'required|string',
                'loadCellID' => 'required|string',
            ]);

            try {
                Personnel::create([
                    'nokartu' => $request->nokartu,
                    'personnel_id' => $request->personnel_id,
                    'nama' => $request->nama,
                    'pangkat' => $request->pangkat,
                    'nrp' => $request->nrp,
                    'jabatan' => $request->jabatan,
                    'kesatuan' => $request->kesatuan,
                    'loadCellID' => $request->loadCellID,
                ]);

                return redirect()->route('personnel')->with('success', 'Data personnel berhasil ditambahkan!');
            } catch (\Exception $e) {
                return redirect()->back()->withErrors('Terjadi kesalahan: ' . $e->getMessage());
            }
        }





    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     $nokartu = $request->nokartu;
    //     $loadCellID = $request->loadCellID;
    //     $personnel_id = $request->personnel_id;
    //     $nama = $request->nama;
    //     $pangkat = $request->pangkat;
    //     $nrp = $request->nrp;
    //     $jabatan = $request->jabatan;
    //     $kesatuan = $request->kesatuan;

    //     $parameter = [
    //         'nokartu' => $nokartu,
    //         'loadCellID' => $loadCellID,
    //         'personnel_id' => $personnel_id,
    //         'nama' => $nama,
    //         'pangkat' => $pangkat,
    //         'nrp' => $nrp,
    //         'jabatan' => $jabatan,
    //         'kesatuan' => $kesatuan
    //     ];

    //     $client = new Client();
    //     $url = "http://localhost:8000/api/personnel-data";
    //     $response = $client->request('POST', $url, [
    //         'headers' => [
    //             'Content-Type' => 'application/json'
    //         ],
    //         'body' => json_encode($parameter)
    //     ]);
    //     $content = $response->getBody()->getContents();
    //     $contentArray = json_decode($content, true);
    //     if ($contentArray['success'] == true) {
    //         $error = $contentArray['data'];
    //         return redirect()->to('personnel-add')->with('error', $error);
    //     }

    //     return redirect()->route('personnel');

    //     // print_r($data);
    // }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $personnel = Personnel::find($id); // Misalnya mengambil data dari model Personnel
        $weapon = Weapon::select('loadCellID')->get();
        return view('webpage.personnel', compact('personnel'), compact('weapon'),);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $personnel = Personnel::find($id);
        $weapon = Weapon::select('loadCellID')->distinct()->get(); // Ambil loadCellID unik
        if (!$personnel) {
            abort(404); // Jika data tidak ditemukan
        }
        return view('webpage.personnel-edit', compact('personnel', 'weapon'));
    }





/**
 * Perbarui sumber daya yang ditentukan di penyimpanan.
 */
public function update(Request $request, string $id)
{
    $personnel = Personnel::where('personnel_id', $id)->first();
    if (!$personnel) {
        return redirect()->route('personnel')->with('error', 'Data tidak ditemukan');
    }

    $request->validate([
        'loadCellID' => 'required|exists:weapons,loadCellID',
        'nama' => 'required',
        'pangkat' => 'required',
        'nrp' => 'required|unique:personnels,nrp,' . $id . ',personnel_id',
        'jabatan' => 'required',
        'kesatuan' => 'required',
    ]);

    $personnel->update([
        'loadCellID' => $request->loadCellID,
        'nama' => $request->nama,
        'pangkat' => $request->pangkat,
        'nrp' => $request->nrp,
        'jabatan' => $request->jabatan,
        'kesatuan' => $request->kesatuan,
    ]);

    return redirect()->route('personnel')->with('success', 'Data berhasil diperbarui');
}




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $personnel = Personnel::where('personnel_id', $id)->first();

        if ($personnel) {
            $personnel->forceDelete();
            return redirect()->route('personnel')->with('success', 'Data berhasil dihapus permanen');
        }

        return redirect()->route('webpage.personnel-delete', compact($personnel))->with('error', 'Data tidak ditemukan');
    }
}
