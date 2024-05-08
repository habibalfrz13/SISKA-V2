<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Myclass; // Pastikan import model Myclass sesuai dengan struktur aplikasi Anda
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MyclassController extends Controller
{
    // Menampilkan semua data kelas
    public function index()
    {
        $myclass = Myclass::all();
        $kelas = Kelas::all();
        return view('dashboard.myclass.index', [
            'myclass' => $myclass,
            'kelas' => $kelas,
        ]);
    }

    public function userIndex()
    {
        $userId = Auth::id();
        $myclass = Myclass::where('id_user', $userId)->get();
       
        return view('dashboard.myclass.userIndex', [
            'myclass' => $myclass,
            
        ]);
    }

    // Menampilkan halaman tambah kelas
    public function create()
    {
        return view('dashboard.myclass.create');
    }

    // Menyimpan data kelas baru
    public function store(Request $request)
{
    // Validasi data yang dikirim dari form
        $request->validate([
            'id_user' => 'required',
            'id_kelas' => 'required',
            // Tambahkan validasi sesuai kebutuhan
        ]);

    // Simpan data kelas baru ke database dengan status "Belum dibayar"
        Myclass::create([
            'id_user' => $request->id_user,
            'id_kelas' => $request->id_kelas,
            'status' => 'Belum dibayar',
        ]);

        Peserta::create([
            'id_user' => $request->id_user,
            'id_kelas' => $request->id_kelas,
            'nama_peserta' => $request->nama_peserta,
            'judul' => $request->judul,
        ]);

        // Redirect ke halaman tertentu atau tampilkan pesan sukses
        return redirect()->route('myclass.userIndex')->with('success', 'Kelas berhasil didaftarkan.');
    }

    // Menampilkan detail kelas
    public function show($id)
    {
        // Menggabungkan tabel Myclass dan Peserta menggunakan kueri join
        $myclass = Myclass::join('pesertas', 'myclasses.id_user', '=', 'pesertas.id_user')
                        ->where('myclasses.id_kelas', $id)
                        ->select('myclasses.id', 'myclasses.status', 'myclasses.foto', 'pesertas.nama_peserta') // Mengambil kolom yang dibutuhkan
                        ->groupBy('myclasses.id', 'myclasses.status', 'myclasses.foto', 'pesertas.nama_peserta') // Mengelompokkan berdasarkan id_kelas, status, foto, dan nama_peserta
                        ->get();

        // Mengirim data ke view
        return view('dashboard.myclass.show', [
            'myclass' => $myclass
        ]);
    }


        
    // Menampilkan halaman edit kelas
    public function edit($id)
    {
        $class = Myclass::find($id);
        return view('dashboard.myclass.edit', ['class' => $class]);
    }

    // Menyimpan perubahan data kelas
    public function update(Request $request, $id)
    {
        // Temukan kelas berdasarkan ID
        $class = Myclass::findOrFail($id);

        // Periksa apakah sudah ada foto
        if ($class->foto) {
            // Update data kelas tanpa validasi foto
            $class->update([
                'status' => 'Aktif', // Mengubah status menjadi 'aktif' tanpa mengunggah bukti transfer
            ]);
            $message = 'Pembayaran Telah Di Konfirmasi';
            $redirectRoute = 'myclass.index'; // Redirect ke halaman index kelas untuk admin
        } else {
            // Validasi data yang dikirim dari form
            $request->validate([
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Menambahkan validasi untuk foto
            ]);

            // Simpan foto bukti transfer
            $image = $request->file('foto');
            $imageName = $image->hashName();
            $image->storeAs('images/buktiTF/', $imageName);

            // Update data kelas
            $class->update([
                'foto' => $imageName,
                'status' => 'Pending', // Mengubah status menjadi 'pending' saat mengunggah bukti transfer
            ]);
            $message = 'Menunggu Konfirmasi Pembayaran';
            $redirectRoute = 'myclass.userIndex'; // Redirect ke halaman userIndex kelas untuk user
        }

        // Redirect ke halaman yang sesuai dengan peran pengguna dengan pesan sukses
        return redirect()->route($redirectRoute)->with('success', $message);
    }



    // Menghapus data kelas
    public function destroy($id)
    {
        // Temukan kelas berdasarkan ID dan hapus
        $class = Myclass::find($id);
        $class->delete();

        // Redirect ke halaman index kelas dengan pesan sukses
        return redirect()->route('myclass.index')
            ->with('success', 'Kelas berhasil dihapus.');
    }
}
