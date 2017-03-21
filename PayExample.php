<?php

interface payStrategy {

    public function pay($amount);
}

class payByCC implements payStrategy {

    private $ccNum = '';
    private $ccType = '';
    private $cvvNum = '';
    private $ccExpMonth = '';
    private $ccExpYear = '';

    public function pay($amount = 0) {
        echo "Paying ". $amount. " using Credit Card <br>";
    }
}

class payByPayPal implements payStrategy {

    //Она будет срабатывать, если сумма продуктов в корзине варьирует от $500 до $1,000.

    private $payPalEmail = '';

    public function pay($amount = 0) {
        echo "Paying ". $amount. " using PayPal <br>";
    }
}


/*
class payByMB implements payStrategy {

    private $mbEmail = '';
    public function pay($amount = 0) {
        echo "Paying ". $amount. " using Money Booker <br>";
    }
}
*/


class shoppingCart {
    public $amount = 0;

    public function __construct($amount = 0) {
        $this->amount = $amount;
    }
    public function getAmount() {
        return $this->amount;
    }
    public function setAmount($amount = 0) {
        $this->amount = $amount;
    }
    public function payAmount() {

       /* if($this->amount > 500 && $this->amount < 1000) {
            $payment = new payByMB();
        }
        elseif($this->amount >= 500) {
            $payment = new payByCC();
        } else {
            $payment = new payByPayPal();
        }
       */


        if($this->amount >= 500) {
            $payment = new payByCC();
        } else {
            $payment = new payByPayPal();
        }
        $payment->pay($this->amount);
    }
}

$cart = new shoppingCart(499);
$cart->payAmount();
// Вывод
//Paying 499 using PayPal


$cart = new shoppingCart(500);
$cart->payAmount();
//Вывод
//Paying 500 using Credit Card

//$cart = new shoppingCart(800);
//$cart->payAmount();
//Вывод
//Paying 800 using Money Booker

