<?php

interface DiscountStrategy {

    public function discount($amount);
}

class DiscountThreePercent implements DiscountStrategy {

    public function discount($amount = 0) {
        echo "Ваш заказ на  " .$amount. "грн вы получаете скидку 3% <br> Сумма к оплате составляет -  ". $amount*0.97 ."грн<br><hr>";
    }
}

class DiscountFivePercent implements DiscountStrategy {

    public function discount($amount = 0) {
        echo "Ваш заказ на  " .$amount. "грн вы получаете скидку 5% <br> Сумма к оплате составляет -  ". $amount*0.95 ."грн<br><hr>";

    }
}

/*
class DiscountSevenPercent implements DiscountStrategy {

    public function discount($amount = 0) {
        echo "Ваш заказ на  " .$amount. "грн вы получаете скидку 10% <br> Сумма к оплате составляет -  ". $amount*0.90 ."грн<br><hr>";
    }
}
*/


class OrderPrice {
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

    public function discountDetermination(){

        if ($this->amount >= 5000) {
            $result = new DiscountThreePercent();
        }
        if ($this->amount >= 10000) {
            $result = new DiscountFivePercent();
        }
/*
        if ($this->amount >= 20000){
           $result = new  DiscountSevenPercent();
        }
*/
        $result->discount($this->amount);
    }
}

$cost = new OrderPrice(5000);
$cost->discountDetermination();     // Определение скидки


$cost = new OrderPrice(10000);
$cost->discountDetermination();

//
//$cost = new OrderPrice(20000);
//$cost->discountDetermination();




