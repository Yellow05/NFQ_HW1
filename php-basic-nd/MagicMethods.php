<?php
/**
 * Created by PhpStorm.
 * User: liudas
 * Date: 18.3.15
 * Time: 13.14
 */

namespace Nfq\Academy\Homework;
/**
Contains:
 * __construct()
 * __destruct()
 * __call()
 * __callStatic()
 * __toString()
 * __invoke()
 */

class Father
{
    //default constructor, checks if params used, supports up to two params.
    function __construct()
    {
        echo 'I have big biceps'.PHP_EOL;
        $a = func_get_args();
        $i = func_num_args();
        if (method_exists($this,$f='__construct'.$i)) {
            call_user_func_array(array($this,$f),$a);
        }
    }
    //constructor if one param used
    function __construct1($param1)
    {
        echo 'I have '.$param1.PHP_EOL;
    }
    //constructor if two param used
    function __construct2($param1, $param2)
    {
        echo 'I have '.$param1.' and '.$param2.PHP_EOL;
    }

}

class Son extends Father
{
    private $name = 'Unnamed';
    function __construct($arg)
    {
        $this->name = $arg;
        parent::__construct();
        echo 'I am very good at math'.PHP_EOL;
    }

    function __destruct()
    {
        echo 'Destroying son'. PHP_EOL;
    }

    //calling object method
    public function __call($name, $arguments)
    {
        echo "Calling object method '$name' "
        . implode(', ', $arguments).PHP_EOL;
    }

    //calling static method
    public static function __callStatic($name, $arguments)
    {
        echo "Calling static method '$name' "
        . implode(', ', $arguments).PHP_EOL;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function __invoke()
    {
        echo 'Who dare to call son as an object?!'.PHP_EOL;
    }
}


//Father if no params added
echo PHP_EOL.'Default father'.PHP_EOL;
$defaultFather = new Father();

//Father if one param added
echo PHP_EOL.'Father with one param'.PHP_EOL;
$oneFather = new Father("Car");

//Father if one param added
echo PHP_EOL.'Two params Father'.PHP_EOL;
$richFather = new Father("Jeep", "House");

//Son inherits all parent props and can have new
echo PHP_EOL.'Son appears'.PHP_EOL;
$son = new Son('Tom');

echo PHP_EOL;
//Calling method as object and returns __toString
echo "Son is: ".$son.PHP_EOL;

//__invoke() is called then object called as function
$son(5);

echo PHP_EOL;
//calls Son object method
$son->test('in object context');

//calls Son static method
Son::test('in static context');

//destroys global references to $son and function __destruct() is called
echo PHP_EOL;
$son = null;
