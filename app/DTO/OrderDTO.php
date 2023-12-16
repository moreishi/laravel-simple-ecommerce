<?php

namespace App\DTO;

class OrderDTO {
    
    public $status;
    public $transaction_id;
    public $user_id;
    public $product_id;

    public function __construct($status, $transaction_id, $user_id, $product_id)
    {
        $this->status = $status = $status;
        $this->transaction_id = $transaction_id;
        $this->user_id = $user_id;
        $this->product_id = $product_id;
    }

}