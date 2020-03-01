<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Billing\PaymentGatewayContract;

class Order extends Model
{
    public function __construct(PaymentGatewayContract $paymentGateway)
    {   
        $this->paymentGateway = $paymentGateway;
    }

    public function charge($amount){
        return $this->paymentGateway->charge($amount);
    }
}
