<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\DTO\OrderCompleteDTO;
use App\Notifications\OrderCompleteNotification;
use Illuminate\Support\Facades\Notification;

class OrderCompleteJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $orderCompleteDTO;

    /**
     * Create a new job instance.
     */
    public function __construct(OrderCompleteDTO $orderCompleteDTO)
    {
        $this->orderCompleteDTO = $orderCompleteDTO;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {   
        Notification::send($this->orderCompleteDTO->user, 
            new OrderCompleteNotification(
                $this->orderCompleteDTO->order, 
                $this->orderCompleteDTO->product));
    }
}
