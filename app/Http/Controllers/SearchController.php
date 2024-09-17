<?php

// app/Http/Controllers/SearchController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // Mengatur data SEO
        $metaTitle = 'Search Results';
        $metaDescription = 'Search through our content to find exactly what you need.';
        $metaKeywords = 'search, keywords, laravel';

        // Mengambil input pencarian dari form
        $query = $request->input('query');

        // Pastikan view utama yang meng-include header.blade.php menerima data SEO
        return view('someview', compact('metaTitle', 'metaDescription', 'metaKeywords', 'query'));
    }
}

