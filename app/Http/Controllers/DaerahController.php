<?php

namespace App\Http\Controllers;

use App\Models\Daerah;
use Illuminate\Http\Request;

class DaerahController extends Controller
{
    public function index()
    {
        $daerahs = Daerah::all();
        return view('daerah', compact('daerahs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_daerah' => 'required|string|max:100',
            'keterangan' => 'nullable|string',
        ]);

        Daerah::create([
            'nama_daerah' => $request->nama_daerah,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('daerah')->with('success', 'Daerah berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $daerah = Daerah::findOrFail($id);
        $daerah->delete();

        return redirect()->route('daerah')->with('success', 'Daerah berhasil dihapus!');
    }
}
