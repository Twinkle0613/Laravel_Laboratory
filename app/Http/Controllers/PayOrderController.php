<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billing\PaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Orders\OrderDetails;
use App\Order;

class PayOrderController extends Controller
{
    public function store(Order $order,OrderDetails $orderDetails,PaymentGatewayContract $paymentGateway){
        // $paymentGateway = new PaymentGateway();

        $orderDetails->all();
        
        dd($order->charge(500));
        // dd($paymentGateway->charge(2500));
    }
}
