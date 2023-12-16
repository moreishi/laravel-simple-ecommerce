<?php

namespace App\Repositories;

use App\Interfaces\IProductRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Product;

class ProductRepository implements IProductRepository {

    public static function findAll() : Collection {
        return Product::all();
    }

    public static function findById(int $productId) : Product {
        return Product::findOrFail($productId);
    }

}