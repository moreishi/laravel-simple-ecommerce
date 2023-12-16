<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use App\Repositories\OrderRepository;
use App\Services\OrderService;

class OrderController extends Controller
{

    public $orderRepository;
    public $orderService;

    public function __construct(
        OrderRepository $orderRepository, 
        OrderService $orderService) {
        
        $this->orderRepository = $orderRepository;
        $this->orderService = $orderService;           

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = $this->orderRepository->findAll();
        return view('orders.index', [
            'orders' => $order]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $orderId)
    {
        $order = $this->orderRepository->findById($orderId);
        return view('orders.show', [
            'order' => $order]);
    }

}
