<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Product;

interface IProductRepository {

    public static function findAll() : Collection;

    public static function findByID(int $productId) : Product;

}