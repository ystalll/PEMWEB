<?php

namespace App\OpenApi\Schemas;

/**
 * @OA\Schema(
 *     schema="Test",
 *     title="Test",
 *     description="Skema data test",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Contoh Test"),
 *     @OA\Property(property="description", type="string", example="Deskripsi opsional"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-07-21T10:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-07-21T10:00:00Z")
 * )
 */
class Test {}
