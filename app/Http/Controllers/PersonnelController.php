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

    public function create(Request $request)
    {
        // Arahkan langsung ke fungsi store
        return $this->store($request);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // buatkan client guzzle
        $client = new Client();
    
        // buatkan url api local
        $url = "http://127.0.0.1:8000/api/rfid-data";
    
        try {
            // jalankan request GET ke api local
            Log::info('Memulai request API ke ' . $url);
            $response = $client->request('GET', $url);
            Log::info('Request API berhasil');
    
            // dapatkan isi dari response
            $content = $response->getBody()->getContents();
            Log::info('Response dari API: ' . $content);
    
            // decode json menjadi array
            $contentArray = json_decode($content, true);
    
            // Pastikan API mengembalikan data yang valid
            if (!isset($contentArray['data'])) {
                throw new \Exception('Format response API tidak valid. Tidak ada field "data".');
            }
    
            // dapatkan data dari array
            $data = $contentArray['data'];
    
            // dapatkan data weapon dari database
            $weapon = Weapon::select('loadCellID')->get();
    
            // Buat instance Personnel baru
            $personnel = new Personnel();
    
            // Ambil nomor kartu dari database atau data API
            $tmprfid = Tmprfid::latest()->value('nokartu');
    
            // Ambil weapon loadCellID
            $weapon = Weapon::value('loadCellID');
    
            // Set field personnel
            $personnel->personnel_id = Personnel::max('personnel_id') + 1;
            $personnel->nama = $request->nama;
            $personnel->pangkat = $request->pangkat;
            $personnel->nrp = $request->nrp;
            $personnel->jabatan = $request->jabatan;
            $personnel->kesatuan = $request->kesatuan;
            $personnel->save();
    
            // return view dengan data yang di dapatkan
            return redirect()->route('webpage.personnel-add', compact('data', 'weapon'));
    
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // Menangani kesalahan pada saat request ke API (misal API tidak tersedia)
            Log::error('Error saat melakukan request ke API: ' . $e->getMessage());
            return response()->json(['error' => 'Gagal mengambil data dari API.'], 500);
        } catch (\Exception $e) {
            // Menangani kesalahan lainnya (misal kesalahan format data atau database)
            Log::error('Error saat melakukan request ke API atau menyimpan data personnel: ' . $e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan saat mengambil data dari API atau menyimpan personnel'], 500);
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
        return view('webpage.personnel-edit', compact('personnel'), compact('weapon'),);
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

        return redirect()->route('webpage.personnel-delete', compact($personnel))->with('error', 'Data tidak ditemukan');
    }
}
