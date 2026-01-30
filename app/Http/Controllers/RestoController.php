<?php

namespace App\Http\Controllers;

use App\Models\Resto;
use App\Models\Daerah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RestoController extends Controller
{
    public function index()
    {
        $restos = Resto::with('daerah')->get();
        $daerahs = Daerah::all();
        return view('resto', compact('restos', 'daerahs'));
    }

    public function publicIndex()
    {
        $restos = Resto::with('daerah')->get();
        $daerahs = Daerah::all();
        return view('public_resto', compact('restos', 'daerahs'));
    }

    public function show($id)
    {
        $resto = Resto::with(['daerah', 'kuliners'])->findOrFail($id);
        $daerahs = Daerah::all();
        return view('detail_resto', compact('resto', 'daerahs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_resto' => 'required|string|max:150',
            'daerah_id' => 'required|exists:daerah,id',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'jam_buka' => 'nullable|string|max:10',
            'jam_tutup' => 'nullable|string|max:10',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('resto_images', 'public');
        }

        Resto::create([
            'nama_resto' => $request->nama_resto,
            'daerah_id' => $request->daerah_id,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
            'gambar' => $imagePath,
        ]);

        return redirect()->route('resto.index')->with('success', 'Resto berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $resto = Resto::findOrFail($id);

        $request->validate([
            'nama_resto' => 'required|string|max:150',
            'daerah_id' => 'required|exists:daerah,id',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'jam_buka' => 'nullable|string|max:10',
            'jam_tutup' => 'nullable|string|max:10',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'nama_resto' => $request->nama_resto,
            'daerah_id' => $request->daerah_id,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
        ];

        if ($request->hasFile('gambar')) {
            if ($resto->gambar && Storage::disk('public')->exists($resto->gambar)) {
                Storage::disk('public')->delete($resto->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('resto_images', 'public');
        }

        $resto->update($data);

        return redirect()->route('resto.index')->with('success', 'Resto berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $resto = Resto::findOrFail($id);
        if ($resto->gambar) {
            Storage::disk('public')->delete($resto->gambar);
        }
        $resto->delete();

        return redirect()->route('resto.index')->with('success', 'Resto berhasil dihapus!');
    }
}
