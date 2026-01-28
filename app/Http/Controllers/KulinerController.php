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
        $kuliners = Kuliner::with(['daerah'])->get();
        $daerahs = Daerah::all();
        
        return view('admin', compact('kuliners', 'daerahs'));
    }

    public function show($id)
    {
        $kuliner = Kuliner::with('daerah')->findOrFail($id);
        $daerahs = Daerah::all(); // For the navbar dropdown
        return view('detail', compact('kuliner', 'daerahs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kuliner' => 'required|string|max:150',
            'daerah_id' => 'required|exists:daerah,id',
            'deskripsi' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gmaps_link' => 'nullable|url',
            'harga' => 'required|string|max:50',
            'alamat' => 'nullable|string',
            'jam_buka' => 'nullable|string|max:10',
            'jam_tutup' => 'nullable|string|max:10',
        ]);

        $imagePath = null;
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('kuliner_images', 'public');
        }

        Kuliner::create([
            'nama_kuliner' => $request->nama_kuliner,
            'daerah_id' => $request->daerah_id,
            'deskripsi' => $request->deskripsi,
            'bahan_utama' => $request->bahan_utama ?? '-',
            'cara_penyajian' => $request->cara_penyajian ?? '-',
            'harga' => $request->harga,
            'alamat' => $request->alamat,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
            'rating' => $request->rating,
            'gambar' => $imagePath,
            'gmaps_link' => $request->gmaps_link,
        ]);

        return redirect()->route('admin')->with('success', 'Kuliner berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $kuliner = Kuliner::findOrFail($id);

        $request->validate([
            'nama_kuliner' => 'required|string|max:150',
            'daerah_id' => 'required|exists:daerah,id',
            'deskripsi' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gmaps_link' => 'nullable|url',
            'harga' => 'required|string|max:50',
            'alamat' => 'nullable|string',
            'jam_buka' => 'nullable|string|max:10',
            'jam_tutup' => 'nullable|string|max:10',
        ]);

        $data = [
            'nama_kuliner' => $request->nama_kuliner,
            'daerah_id' => $request->daerah_id,
            'deskripsi' => $request->deskripsi,
            'rating' => $request->rating,
            'gmaps_link' => $request->gmaps_link,
            'harga' => $request->harga,
            'alamat' => $request->alamat,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
        ];

        if ($request->hasFile('gambar')) {
            // Delete old image
            if ($kuliner->gambar && Storage::disk('public')->exists($kuliner->gambar)) {
                Storage::disk('public')->delete($kuliner->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('kuliner_images', 'public');
        }

        $kuliner->update($data);

        return redirect()->route('admin')->with('success', 'Kuliner berhasil diperbarui!');
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
