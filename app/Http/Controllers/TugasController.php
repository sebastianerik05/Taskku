<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{

    public function index(Request $request)
    {
        
        $tugas = Tugas::latest()->get();

    
        $totalTugas = Tugas::count();

        $belumSelesai = Tugas::where(
            'status', 'Belum Selesai'
        )->count();

        $sudahSelesai = Tugas::where(
            'status', 'Selesai'
        )->count();

        
        $hariIni = Tugas::whereDate('tenggat', today())
            ->where('status', 'Belum Selesai')
            ->count();

    
        $terlambat = Tugas::whereDate('tenggat', '<', today())
            ->where('status', 'Belum Selesai')
            ->count();

    
        $persentase = $totalTugas > 0
            ? round(($sudahSelesai / $totalTugas) * 100)
            : 0;

        
        $tugasTerdekat = Tugas::where('status', 'Belum Selesai')
            ->whereDate('tenggat', '>=', today())
            ->orderBy('tenggat')
            ->take(5)
            ->get();


        $query = Tugas::query();


        if ($request->filled('cari')) {
            $cari = $request->cari;

            $query->where(function ($q) use ($cari) {
                $q->where('judul', 'like', "%{$cari}%")
                    ->orWhere('mata_kuliah', 'like', "%{$cari}%");
            });
        }

    
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('prioritas')) {
            $query->where('prioritas', $request->prioritas);
        }


        $daftarTugas = $query->latest()->get();

        return view('dashboard', compact(
            'tugas',
            'totalTugas',
            'belumSelesai',
            'sudahSelesai',
            'hariIni',
            'terlambat',
            'persentase',
            'tugasTerdekat',
            'daftarTugas'
        ));
    }


    // HALAMAN TAMBAH TUGAS
    public function create()
    {
        return view('tugas.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'mata_kuliah' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tenggat' => 'required|date',
            'status' => 'required|in:Belum Selesai,Selesai',
            'prioritas' => 'required|in:Tinggi,Sedang,Rendah',
        ]);

        Tugas::create($data);

        return redirect()->route('tugas.index')
            ->with('success', 'Tugas berhasil ditambahkan!');
    }


    public function edit(Tugas $tugas)
    {
        return view('tugas.edit', compact('tugas'));
    }



    public function update(Request $request, Tugas $tugas)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'mata_kuliah' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tenggat' => 'required|date',
            'status' => 'required|in:Belum Selesai,Selesai',
            'prioritas' => 'required|in:Tinggi,Sedang,Rendah',
        ]);

        $tugas->update($data);

        return redirect()->route('tugas.index')
            ->with('success', 'Tugas berhasil diperbarui!');
    }



    public function destroy(Tugas $tugas)
    {
        $tugas->delete();

        return redirect()->route('tugas.index')
            ->with('success', 'Tugas berhasil dihapus!');
    }


    public function kalender()
    {
        $tugas = Tugas::orderBy('tenggat')->get();

        return view('kalender', compact('tugas'));
    }


    public function statistik()
    {
        $totalTugas = Tugas::count();

        $sudahSelesai = Tugas::where(
            'status', 'Selesai'
        )->count();

        $belumSelesai = Tugas::where(
            'status', 'Belum Selesai'
        )->count();

        $persentase = $totalTugas > 0
            ? round(($sudahSelesai / $totalTugas) * 100)
            : 0;

        return view('statistik', compact(
            'totalTugas',
            'sudahSelesai',
            'belumSelesai',
            'persentase'
        ));
    }
}
