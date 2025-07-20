<?php
namespace App\Http\Controllers;

use App\Models\PaketWisata;
use Illuminate\Http\Request;

class PaketWisataController extends Controller
{
    public function index()
    {
        return PaketWisata::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'durasi' => 'required|string',
        ]);

        $paket = PaketWisata::create($request->all());

        return response()->json(['status' => 'success', 'data' => $paket], 201);
    }

    public function show($id)
    {
        $paket = PaketWisata::findOrFail($id);
        return $paket;
    }

    public function update(Request $request, $id)
    {
        $paket = PaketWisata::findOrFail($id);
        $paket->update($request->all());

        return response()->json(['status' => 'success', 'data' => $paket]);
    }

    public function destroy($id)
    {
        $paket = PaketWisata::findOrFail($id);
        $paket->delete();

        return response()->json(['status' => 'deleted']);
    }
}
