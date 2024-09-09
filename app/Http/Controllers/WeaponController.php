<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class WeaponController extends Controller
{
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
}
