<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Products",
 *     description="Manajemen Produk"
 * )
 */
class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/products",
     *     tags={"Products"},
     *     summary="Ambil semua produk",
     *     security={{"ApiKeyAuth": {}}},
     *     @OA\Response(response=200, description="Daftar produk")
     * )
     */
    public function index()
    {
        return response()->json(Product::all());
    }

    /**
     * @OA\Post(
     *     path="/api/products",
     *     tags={"Products"},
     *     summary="Simpan produk baru",
     *     security={{"ApiKeyAuth": {}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "price"},
     *             @OA\Property(property="name", type="string", example="Laptop"),
     *             @OA\Property(property="price", type="number", format="float", example=15990000)
     *         )
     *     ),
     *     @OA\Response(response=201, description="Produk disimpan")
     * )
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $product = Product::create($data);
        return response()->json($product, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/products/{id}",
     *     tags={"Products"},
     *     summary="Ambil detail produk",
     *     security={{"ApiKeyAuth": {}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Detail produk ditemukan"),
     *     @OA\Response(response=404, description="Produk tidak ditemukan")
     * )
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    /**
     * @OA\Put(
     *     path="/api/products/{id}",
     *     tags={"Products"},
     *     summary="Update produk",
     *     security={{"ApiKeyAuth": {}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", example="Update Nama"),
     *             @OA\Property(property="price", type="number", format="float", example=120000)
     *         )
     *     ),
     *     @OA\Response(response=200, description="Produk diperbarui")
     * )
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
            'name' => 'string',
            'price' => 'numeric',
        ]);

        $product->update($data);
        return response()->json($product);
    }

    /**
     * @OA\Delete(
     *     path="/api/products/{id}",
     *     tags={"Products"},
     *     summary="Hapus produk",
     *     security={{"ApiKeyAuth": {}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="Produk dihapus")
     * )
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(null, 204);
    }

    /**
     * @OA\Post(
     *     path="/api/products/decrypt",
     *     tags={"Products"},
     *     summary="Contoh endpoint decrypt response (opsional)",
     *     security={{"ApiKeyAuth": {}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"encrypted_data"},
     *             @OA\Property(property="encrypted_data", type="string", example="encrypted_string_here")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Data berhasil didekripsi")
     * )
     */
    public function decryptResponse(Request $request)
    {
        // dummy decryption
        $data = $request->input('encrypted_data');
        return response()->json(['decrypted' => $data]);
    }
}
