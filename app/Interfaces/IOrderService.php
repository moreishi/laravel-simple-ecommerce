<?php

namespace App\Interfaces;

use App\Models\Order;
use App\DTO\OrderDTO;

interface IOrderService {

    public static function create(OrderDTO $orderDTO) : Order;

    public static function update(OrderDTO $orderDTO, int $orderId) : Order;

}