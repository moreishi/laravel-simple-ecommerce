<?php

namespace App\Services;

use App\Interfaces\IOrderService;
use App\Models\Order;
use App\DTO\OrderDTO;

class OrderService implements IOrderService {

    public static function create(OrderDTO $orderDTO) : Order {
        
        $order = new Order;
        $order->status = $orderDTO->status;
        $order->transaction_id = $orderDTO->transaction_id;
        $order->user_id = $orderDTO->user_id;
        $order->product_id = $orderDTO->product_id;
        $order->save();

        return $order;

    }

    public static function update(OrderDTO $orderDTO, int $orderId) : Order {
        
        $order = Order::findOrFail($orderId);
        $order->status = $orderDTO->status;
        $order->transaction_id = $orderDTO->transaction_id;
        $order->user_id = $orderDTO->user_id;
        $order->product_id = $orderDTO->product_id;
        $order->save();
        
        return $order;

    }

}