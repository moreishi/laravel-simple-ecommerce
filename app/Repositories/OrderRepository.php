<?php

namespace App\Repositories;

use App\Interfaces\IOrderRepository;
use App\Models\Order;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class OrderRepository implements IOrderRepository {

    public static function findAll() : Collection {
        return  Order::where('user_id', Auth::user()->id)->with(['user','product'])->get();
    }

    public static function findById(string $transactionId) : Order {
        return Order::where('transaction_Id', $transactionId)->with(['user','product'])->first();
    }

}