<?php
class Beverage
{
    public $temperature, $color, $opacity;
    function __construct($temperature, $color)
    {
        $this->temperature = $temperature;
        $this->color = $color;
    }

    function getInfo()
    {
        return "This beverage is $this->temperature and $this->color.";
    }
}


$red_wine = new Beverage("moderate", "red");
echo $red_wine->getInfo();

echo "\n\n****    Inheritance and override method from parent   ****\n";
class Milk extends Beverage
{
    function __construct()
    {
        $this->temperature = "cold";
    }
    function getInfo()
    {
        return "This beverage is $this->temperature. I like my milk this way.";
    }
}

$milk = new Milk();
echo $milk->getInfo();


echo "\n\n****    Visibility - Private Members   ****\n";
class Pet
{
    private $healthScore = 0;
    public $publicHealthScore = 0;
    function exercise()
    {
        $this->healthScore++;
    }
    function feed()
    {
        $this->healthScore++;
    }
    function healthCheck()
    {
        if ($this->healthScore >= 2) {
            echo "This is a healthy pet!\n";
        } else {
            echo "This is an unhealthy pet\n";
        }
    }
}

$pesho = new Pet();
$pesho->exercise();
$pesho->feed();
$pesho->healthCheck();
// echo $pesho->healthScore;       // PHP Fatal error:  Uncaught Error: Cannot access private property
echo $pesho->publicHealthScore;


echo "\n\n****    Visibility - Protected Members   ****\n";
echo "****    child can access protected properties and methods internally while still preventing them from being accessed externally   ****\n";

class Human
{
    protected $healthScore = 0;
}

class Kid extends Human
{
    function brushTeeth()
    {
        $this->healthScore++;
    }

    function healthCheck()
    {
        return "Health score: $this->healthScore";
    }
}

$ivan = new Kid();
echo $ivan->brushTeeth(); // Successfully increments healthScore
echo $ivan->healthCheck();
// echo $ivan->healthScore; // Error


echo "\n\n****    Getters and Setters   ****\n";
class Car
{
    private $model;

    function setModel($model)
    { // make it lowercase
        $this->model = strtoupper($model);
    }
    function getModel()
    {
        return $this->model;
    }
}

$vw = new Car("passat");
//   echo $vw->model;  // error
echo "model: {$vw->getModel()}\n"; // no model has been assigned
echo $vw->setModel("goLf");
echo "model: {$vw->getModel()}";


echo "\n\n****    Static Members    ****\n";
/*
- functions and variables which we don’t need to instantiate 
- add the keyword static to its definition.
- accessing these - use the Scope Resolution Operator (::). This can be thought of as switching briefly into the scope of the class itself. 
Since we are inside the scope, we access properties with the dollar sign.
*/
class AdamsUtils
{
    public static $the_answer = 42;
    public static function addTowel($string)
    {
        return $string . " and a towel.";
    }
}

echo AdamsUtils::$the_answer;
echo "\n";
echo AdamsUtils::addTowel("I brought apples");


