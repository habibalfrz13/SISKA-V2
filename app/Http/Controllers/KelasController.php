<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Myclass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    // Menampilkan semua kelas
    public function index()
    {
        $kelas = Kelas::all();
        return view('dashboard.kelas.index', compact('kelas'));
    }


    public function userIndex()
    {
        // Ambil ID pengguna saat ini
        $userId = Auth::id(); 
    
        // Ambil semua kelas dengan status aktif yang belum diambil oleh pengguna saat ini
        $kelas = Kelas::where('status', 'aktif')
                        ->whereNotExists(function ($query) use ($userId) {
                            $query->select(DB::raw(1))
                                ->from('myclasses')
                                ->whereRaw('myclasses.id_kelas = kelas.id')
                                ->where('id_user', $userId);
                        })
                        ->get();
        
        // Kirim data kelas yang belum diambil oleh pengguna ke view
        return view('dashboard.kelas.userIndex', [
            'kelas' => $kelas
        ]);
    }
    

    // Menampilkan formulir untuk menambahkan kelas baru
    public function create()
    {
        return view('dashboard.kelas.create');
    }


    // Menyimpan kelas baru yang dibuat
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'foto'  => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'judul' => 'required',
            'kuota' => 'required|integer',
            'pelaksanaan' => 'required|date',
        ]);
    
        // Mengatur status menjadi "Tidak Aktif" secara langsung
        $request->merge(['status' => 'Tidak Aktif']);
        $images = $request->file('foto');
        $images->storeAs('images/galerikelas/', $images->hashName());

        // Simpan kelas baru ke dalam database
        Kelas::create([
            'judul' => $request->judul,
            'kuota' => $request->kuota,
            'pelaksanaan' => $request->pelaksanaan,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'foto' => $images->hashName(),
        ]);

    
        // Redirect ke halaman index kelas
        return redirect()->route('kelas.index')->with('success', 'Kelas created successfully.');
    }
    

    // Menampilkan detail kelas
    public function show($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('dashboard.kelas.show', compact('kelas'));
    }

    // Menampilkan formulir untuk mengedit kelas
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('dashboard.kelas.edit', compact('kelas'));
    }

    // Memperbarui informasi kelas
    public function update(Request $request, $id)
{
    // Validasi data input
    $request->validate([
        'judul' => 'required',
        'kuota' => 'required|integer',
    ]);

    // Perbarui informasi kelas di dalam database
    $kelas = Kelas::findOrFail($id);
    $kelas->update([
        'judul' => $request->judul,
        'kuota' => $request->kuota,
        'pelaksanaan' => $request->pelaksanaan,
        'status' => $request->status // Mengambil nilai status dari permintaan
    ]);

    // Redirect ke halaman index kelas
    return redirect()->route('kelas.index')->with('success', 'Kelas updated successfully.');
}

    // Menghapus kelas
    public function destroy($id)
    {
        // Temukan kelas yang ingin dihapus
        $kelas = Kelas::findOrFail($id);

        // Hapus kelas dari database
        $kelas->delete();

        // Redirect ke halaman index kelas
        return redirect()->route('kelas.index')->with('success', 'Kelas deleted successfully.');
    }
}
