<?php


class Context
{
    private $strategy;

    public function setStrategy( Strategy $value)
    {
        $this->strategy = $value;
    }

    public function getStrategy()
    {
        return $this->strategy;
    }

    public function ContextInterface()
    {
        $this->strategy->algorithmInterface();
    }
}

abstract class Strategy
{
    public abstract function algorithmInterface();
}

class ConcreteStrategyA extends Strategy
{

    public function algorithmInterface()
    {
        echo "Algorithm A <br>";
    }
}

class ConcreteStrategyB extends Strategy
{
    public function algorithmInterface()
    {
        echo "Algorithm B <br>";
    }
}

class ConcreteStrategyC extends Strategy
{
    public function algorithmInterface()
    {
        echo "Algorithm C <br>";
    }
}

$context = new Context();

$conStratA = new ConcreteStrategyA();
$context->setStrategy($conStratA);
$context->ContextInterface();

$conStratB = new ConcreteStrategyB();
$context->setStrategy($conStratB);
$context->ContextInterface();

$conStratC = new ConcreteStrategyC();
$context->setStrategy($conStratC);
$context->ContextInterface();





























