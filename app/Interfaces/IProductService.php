<?php

namespace App\Interfaces;

use App\Models\Product;
use App\DTO\ProductDTO;

interface IProductService {

    public static function create(ProductDTO $productDTO) : Product;

    public static function update(ProductDTO $productDTO, int $productId) : Product;

}