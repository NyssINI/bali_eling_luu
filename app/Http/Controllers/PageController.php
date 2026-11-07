<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function edukasi(Request $request)
    {
        return view('pages.edukasi', [
            'jenis' => $request->query('jenis'),
        ]);
    }

    public function panduan()
    {
        return view('pages.panduan');
    }
}
