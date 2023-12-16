<?php

namespace App\Services;

use App\Interfaces\IProductService;

use App\Models\Product;
use App\DTO\ProductDTO;

class ProductService implements IProductService {

    public static function create(ProductDTO $productDTO) : Product {
        return Product::create();
    }

    public static function update(ProductDTO $productDTO, int $productId) : Product {
        $product = Product::findOrFail($productId);
        return $product;
    }

}