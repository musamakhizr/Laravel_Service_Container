<?php

namespace App\Billing;

use Illuminate\Support\Str;

class BankPaymentGateway implements PaymentGatewayContract
{
    private $currency;
    private $discount;
    public function __construct($currency)
    {
        $this->currency = $currency;
        $this->discount = 0;
    }
    //@override
    public function setDiscount($amount)
    {
        $this->discount = $amount;
    }
    //@override 
    public function charge($amount)
    {
        //charge the bank

        return [
            'amount' => $amount-$this->discount,
            'confirmation_number' => Str::random(),
            'currency' => $this->currency,
            'discount'=>$this->discount,
        ];
    }  
}