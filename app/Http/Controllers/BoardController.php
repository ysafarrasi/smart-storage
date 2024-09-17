<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BoardController extends Controller
{
    public function index(){
        return view('board');
    }
    
    public function showDataBoard()
    {
        return view('/board');
    }

    public function loadData()
    {
        $response = Http::get('http://localhost:8000/api/load-cell-data');
        $data = $response->json()['data'] ?? [];

        // Urutkan data berdasarkan rackNumber secara ascending
        usort($data, function ($a, $b) {
            return $a['rackNumber'] <=> $b['rackNumber'];
        });

        return $data;
    }
}