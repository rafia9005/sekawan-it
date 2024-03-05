<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlatResource;
use App\Models\Alat;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    public function index()
    {
        $alat = Alat::with('Kategori:id,kategori_nama')->get();

        if ($alat->count() === 0) {
            return response()->json([
                'msg' => 'Data alat masih kosong',
                'data' => []
            ], 404);
        }

        return AlatResource::collection($alat);
    }
    public function show($id)
    {
        $alat = Alat::with('Kategori:id,kategori_nama')->findOrFail($id);
        if (!$alat) {
            return response()->json([
                'msg' => 'Alat tidak di temukan',
                'data' => []
            ], 404);
        }
        return new AlatResource($alat);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'alat_kategori_id' => 'sometimes|exists:kategori,id',
            'alat_nama' => 'sometimes|string',
            'alat_deskripsi' => 'sometimes|string',
            'alat_hargaperhari' => 'sometimes|numeric',
            'alat_stok' => 'sometimes|integer',
        ]);

        $alat = Alat::findOrFail($id);

        $alat->update($request->all());

        return response()->json([
            'msg' => 'Alat berhasil di update',
            'data' => $alat
        ]);
    }
    public function create(Request $request)
    {
        $request->validate([
            'alat_kategori_id' => 'required|exists:kategori,id',
            'alat_nama' => 'required|string',
            'alat_deskripsi' => 'required|string',
            'alat_hargaperhari' => 'required|numeric',
            'alat_stok' => 'required|integer',
        ]);

        $alat = Alat::create($request->all());

        return response()->json([
            'msg' => 'Alat berhasil di buat'
        ], 201);
    }
    public function delete(Request $request, $id)
    {
        $alat = Alat::find($id);
        if(!$alat){
            return response()->json([
                'msg' => 'Alat tidak di temukan'
            ], 404);
        }
        return response()->json([
            'msg' => 'Alat berhasil di hapus'
        ], 200);
    }
}
