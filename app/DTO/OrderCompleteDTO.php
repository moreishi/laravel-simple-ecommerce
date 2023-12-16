<?php

namespace App\DTO;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;

class OrderCompleteDTO {

    public $order;
    public $product;
    public $user;

    public function __construct(
        User $user, 
        Order $order, 
        Product $product)
    {
        $this->order = $order;
        $this->product = $product;
        $this->user = $user;
    }

}