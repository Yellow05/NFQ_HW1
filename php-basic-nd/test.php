<?php

//use Nfq\Academy\Homework\ClassA;
//use Nfq\Academy\Homework\Subpackage\ClassB;
//
//include 'src/ClassA.php';
//include 'src/Subpackage/ClassB.php';
//
////require_once __DIR__.'/bootstrap.php';
//
//$a = new ClassA();
//$a->doSomething();
//
//$b = new ClassB();
//$b->doSomething();

use Nfq\Academy\Homework\ClassA;
use Nfq\Academy\Homework\DebugInfo;
use Nfq\Academy\Homework\Subpackage\DoubleSubpackage\SetGetIssetUnset;
use Nfq\Academy\Homework\Subpackage\DoubleSubpackage\TripleSubpackage\SetState;

require_once __DIR__.'/bootstrap.php';

/**
 *MagicMethods.php
 * contains these magic methods:
 * __construct()
 * __destruct()
 * __call()
 * __callStatic()
 * __toString()
 * __invoke()
 */
require_once ('MagicMethods.php');

/**
 * Clone.php contains __clone() magic method.
 * then changed $copied object obj1 property name
 * changes only in copied one, and then change obj2
 * changes in both $copied and $original, because in
 * __copy() function only obj1 was pointed to be copied
 * and obj2 is just pointing in same obj
 */
require_once ('Clone.php');

echo PHP_EOL;

//var_dump shows in format as declared at __debugInfo() magic method (DebugInfo.php)
var_dump(new DebugInfo(7, 21));

echo PHP_EOL;

//declared in SetGetIssetUnset.php
$m = new SetGetIssetUnset();
//writing data to inaccessible properties __set is called
$m->title= "New super title";

//reading data from inaccessible properties __get is called
echo $m->title.PHP_EOL.PHP_EOL;

//then checking if isset inaccessible prop, __isset is called;
var_dump(isset($m->title));

//__unset() invoked when unset() is used on inaccessible properties.
unset($m->title);

echo PHP_EOL;

//declared in SetState.php
$a = new SetState;
$aString = var_export($a, true);
//to display objString in browser i have to use eval function, and ir requires __set_state method
eval('$a = ' .$aString. ';');

