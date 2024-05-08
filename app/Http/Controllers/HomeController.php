<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total = Kelas::count();
        $aktif = Kelas::where('status', 'Aktif')->count();
        $noaktif = Kelas::where('status', 'Tidak Aktif')->count();
        $certifications = Kelas::all();
        return view('dashboard.home', [
            'total' => $total,
            'aktif' => $aktif,
            'noaktif' => $noaktif,
            'certifications' => $certifications
        ]);
    }
}
