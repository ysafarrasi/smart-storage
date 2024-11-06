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
            // Ambil data nokartu terbaru dari API dengan timeout yang lebih lama dan retry yang lebih panjang
            try {
                $response = Http::retry(5, 500) // Mencoba 5 kali dengan jeda 500ms antara setiap percobaan
                                ->timeout(10) // Timeout 10 detik
                                ->get('http://127.0.0.1:8000/api/rfid-data');
        
                if ($response->failed()) {
                    return back()->withErrors(['nokartu' => 'Gagal mengambil data kartu RFID dari API.']);
                }
        
                $tmprfid = $response->json()['data'] ?? null;
            } catch (\Exception $e) {
                return back()->withErrors(['nokartu' => 'Terjadi kesalahan saat mengambil data RFID: ' . $e->getMessage()]);
            }
        
            // Pastikan ada data nokartu yang valid
            if (!$tmprfid || empty($tmprfid['nokartu'])) {
                return back()->withErrors(['nokartu' => 'Tidak ada data kartu RFID yang tersedia.']);
            }
        
            // Validasi data form
            $validatedData = $request->validate([
                'loadCellID' => 'required|exists:weapons,loadCellID',
                'personnel_id' => 'required|unique:personnels,personnel_id',
                'nama' => 'required|string|max:255',
                'pangkat' => 'required|string|max:255',
                'nrp' => 'required|string|max:255',
                'jabatan' => 'required|string|max:255',
                'kesatuan' => 'required|string|max:255',
            ]);
        
            try {
                // Simpan data personnel baru ke database
                $personnel = new Personnel();
                $personnel->nokartu = $tmprfid['nokartu']; // Mengambil nomor kartu dari respons API
                $personnel->loadCellID = $validatedData['loadCellID'];
                $personnel->personnel_id = $validatedData['personnel_id'];
                $personnel->nama = $validatedData['nama'];
                $personnel->pangkat = $validatedData['pangkat'];
                $personnel->nrp = $validatedData['nrp'];
                $personnel->jabatan = $validatedData['jabatan'];
                $personnel->kesatuan = $validatedData['kesatuan'];
                $personnel->save();
        
                return redirect()->route('personnel')->with('success', 'Data personnel berhasil ditambahkan dan nomor kartu disimpan.');
            } catch (\Exception $e) {
                return back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data personnel: ' . $e->getMessage()]);
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
    $personnel = Personnel::find($id); // Pastikan data ditemukan
    $weapon = Weapon::select('loadCellID')->get();
    if (!$personnel) {
        abort(404); // Jika tidak ditemukan, tampilkan error 404
    }
    return view('webpage.personnel-edit', compact('personnel'), compact('weapon'));
}


/**
 * Perbarui sumber daya yang ditentukan di penyimpanan.
 */
public function update(Request $request, string $id)
{
    $request->validate([
        'loadCellID' => 'required',
        'nama' => 'required',
        'pangkat' => 'required',
        'nrp' => 'required',
        'jabatan' => 'required',
        'kesatuan' => 'required',
        'nokartu' => 'required',
    ]);

    $personnel = Personnel::where('personnel_id', $id)->first();

    if ($personnel) {
        $personnel->update([
            'nama' => $request->nama,
            'pangkat' => $request->pangkat,
            'nrp' => $request->nrp,
            'jabatan' => $request->jabatan,
            'kesatuan' => $request->kesatuan,
            'nokartu' => $request->nokartu,
            'loadCellID' => $request->loadCellID
        ]);

        return redirect()->route('personnel')->with('success', 'Data berhasil diperbarui');
    }

    return redirect()->route('personnel.edit', $id)->with('error', 'Data tidak ditemukan');
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
