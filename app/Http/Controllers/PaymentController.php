<?php

namespace App\Http\Controllers;

use App\DTO\OrderDTO;
use App\DTO\OrderCompleteDTO;
use App\DTO\ProductDTO;
use App\Jobs\OrderCompleteJob;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;
use App\Services\OrderService;
use App\Services\ProductService;
use App\Repositories\ProductRepository;

class PaymentController extends Controller
{
    public function handlePayment(Request $request, int $productId)
    {

        $product = ProductRepository::findById($productId);
        $price = $product->price / 100;

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('success.payment', ['productId' => $product->id]),
                "cancel_url" => route('cancel.payment', ['productId' => $product->id]),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $price
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect()
                ->route('cancel.payment', ['productId' => $product->id])
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('products',['productId' => $product->id])
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function paymentCancel(Request $request, int $productId)
    {
        return redirect()
            ->route('products.show', ['productId' => $productId])
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

    public function paymentSuccess(Request $request, int $productId)
    {

        $product = ProductRepository::findById($productId);
        $user = Auth::user();

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            
            $orderDTO = new OrderDTO('COMPLETED', $response['id'], $user->id, $product->id);
            $order = OrderService::create($orderDTO);
            $orderCompleteDTO = new OrderCompleteDTO($user, $order, $product);
            
            /**
             * Process Order Jobs
             */
            OrderCompleteJob::dispatch($orderCompleteDTO);

            return redirect()
                ->route('orders.show', ['orderId' => $order->transaction_id])
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('products.show', ['productId' => $productId])
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
}
