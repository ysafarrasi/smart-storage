<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class WeaponController extends Controller
{

    public function index()
    {
        $weapons = Weapon::all(); // Pastikan model Weapon sudah ada
        return view('weapon', compact('weapons')); // Kirim data ke view
    }


    public function ShowDataWeapon()
    {
        $client = new Client();
        $url = "http://localhost:8000/api/load-cell-data";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        return view('weapon', ['data' => $data]);
    }

    public function filter($timeframe)
    {
        $today = now();

        $query = Weapon::query();

        match ($timeframe) {
            'today' => $query->whereDate('created_at', $today),
            'week' => $query->whereBetween('created_at', [$today->startOfWeek(), $today->endOfWeek()]),
            'month' => $query->whereMonth('created_at', $today->month)->whereYear('created_at', $today->year),
        };

        return $query->get();
    }
}

