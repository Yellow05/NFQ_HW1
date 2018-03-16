<?php
/**
 * Created by PhpStorm.
 * User: liudas
 * Date: 18.3.16
 * Time: 15.21
 */
namespace Nfq\Academy\Homework;

class Clonable
{
    public $obj1;
    public $obj2;

    function __clone()
    {
        $this->obj1 = clone $this->obj1;
    }
}

class SubClass
{
    public $name;

    public function __construct($var) {
        $this->name = $var;
    }

}

$original = new Clonable();

$original->obj1 = new SubClass("Jeff");
$original->obj2 = new SubClass("Tom");

$copied = clone $original;

$copied->obj1->name ="Harry";
$copied->obj2->name ="Johnny";


print("Original Object:\n");
print_r($original);

print("Cloned Object:\n");
print_r($copied);
/**
 * then changed $copied object obj1 property name
 * changes only in copied one, and then change obj2
 * changes in both $copied and $original, because in
 * __copy() function only obj1 was pointed to be copied
 * and obj2 is just pointing in same obj
 */
