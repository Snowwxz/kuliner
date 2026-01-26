<?php

namespace App\Http\Controllers;

use App\Models\Kuliner;
use App\Models\Kategori;
use App\Models\Daerah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KulinerController extends Controller
{
    public function index()
    {
        $kuliners = Kuliner::with(['kategori', 'daerah'])->get();
        $kategoris = Kategori::all();
        $daerahs = Daerah::all();
        
        return view('admin', compact('kuliners', 'kategoris', 'daerahs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kuliner' => 'required|string|max:150',
            'kategori_id' => 'required|exists:kategori,id',
            'daerah_id' => 'required|exists:daerah,id',
            'deskripsi' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('kuliner_images', 'public');
        }

        Kuliner::create([
            'nama_kuliner' => $request->nama_kuliner,
            'kategori_id' => $request->kategori_id,
            'daerah_id' => $request->daerah_id,
            'deskripsi' => $request->deskripsi,
            'bahan_utama' => $request->bahan_utama ?? '-',
            'cara_penyajian' => $request->cara_penyajian ?? '-',
            'rating' => $request->rating,
            'gambar' => $imagePath,
        ]);

        return redirect()->route('admin')->with('success', 'Kuliner berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $kuliner = Kuliner::findOrFail($id);
        
        if ($kuliner->gambar) {
            Storage::disk('public')->delete($kuliner->gambar);
        }
        
        $kuliner->delete();

        return redirect()->route('admin')->with('success', 'Kuliner berhasil dihapus!');
    }
}
