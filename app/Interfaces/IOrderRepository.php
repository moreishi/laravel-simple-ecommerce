<?php

namespace App\Interfaces;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

interface IOrderRepository {

    public static function findAll() : Collection;

    public static function findById(string $transactionId) : Order;

}