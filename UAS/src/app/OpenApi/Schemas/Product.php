<?php

namespace App\OpenApi\Schemas;

/**
 * @OA\Schema(
 *     schema="Product",
 *     title="Product",
 *     type="object",
 *     required={"name", "price"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Laptop Gaming"),
 *     @OA\Property(property="price", type="number", format="float", example=15999000),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */
class Product {}
