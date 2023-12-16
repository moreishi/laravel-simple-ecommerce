<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;

class OrderCompleteNotification extends Notification
{
    use Queueable;

    public $order;

    public $product;

    /**
     * Create a new notification instance.
     */
    public function __construct(Order $order, Product $product)
    {
        $this->order = $order;

        $this->product = $product;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {

        $total = $this->product->price / 100;

        return (new MailMessage)->markdown('mail.orders.complete', [
                        'title' => $this->product->name,
                        'transaction' => $this->order->transaction_id,
                        'total' => $total,
                        'status' => $this->order->status
                    ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
