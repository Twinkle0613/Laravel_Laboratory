<?php

namespace App\Orders;

use Illuminate\Support\Str;
use App\Billing\PaymentGateway;
use App\Billing\PaymentGatewayContract;

class OrderDetails
{

    public function __construct(PaymentGatewayContract $paymentGateway)
    {   
        $this->paymentGateway = $paymentGateway;
    }

    public function all(){

        $this->paymentGateway->setDiscount(500);

        return [
            'name' => 'Victor',
            'address' => '123asdasd' 
        ];
    }

    public function call(){
        return 'call';
    }
}