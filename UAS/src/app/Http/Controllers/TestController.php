<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Tests",
 *     description="Manajemen data Test"
 * )
 */
class TestController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/tests",
     *     tags={"Tests"},
     *     summary="Ambil semua data test",
     *     @OA\Response(response=200, description="Berhasil")
     * )
     */
    public function index()
    {
        return response()->json(Test::all());
    }

    /**
     * @OA\Post(
     *     path="/api/tests",
     *     tags={"Tests"},
     *     summary="Simpan data test baru",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name"},
     *             @OA\Property(property="name", type="string", example="Contoh Tes"),
     *             @OA\Property(property="description", type="string", example="Deskripsi opsional")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Data berhasil disimpan")
     * )
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $test = Test::create($data);
        return response()->json($test, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/tests/{id}",
     *     tags={"Tests"},
     *     summary="Ambil detail test berdasarkan ID",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Berhasil"),
     *     @OA\Response(response=404, description="Data tidak ditemukan")
     * )
     */
    public function show($id)
    {
        $test = Test::findOrFail($id);
        return response()->json($test);
    }

    /**
     * @OA\Put(
     *     path="/api/tests/{id}",
     *     tags={"Tests"},
     *     summary="Update data test",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", example="Update Nama"),
     *             @OA\Property(property="description", type="string", example="Update Deskripsi")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Data berhasil diperbarui")
     * )
     */
    public function update(Request $request, $id)
    {
        $test = Test::findOrFail($id);

        $data = $request->validate([
            'name' => 'sometimes|required|string',
            'description' => 'nullable|string',
        ]);

        $test->update($data);
        return response()->json($test);
    }

    /**
     * @OA\Delete(
     *     path="/api/tests/{id}",
     *     tags={"Tests"},
     *     summary="Hapus data test",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="Data berhasil dihapus")
     * )
     */
    public function destroy($id)
    {
        $test = Test::findOrFail($id);
        $test->delete();
        return response()->json(null, 204);
    }
}
