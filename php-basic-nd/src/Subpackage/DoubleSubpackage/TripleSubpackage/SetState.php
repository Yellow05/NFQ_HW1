<?php
/**
 * Created by PhpStorm.
 * User: liudas
 * Date: 18.3.16
 * Time: 14.50
 */
namespace Nfq\Academy\Homework\Subpackage\DoubleSubpackage\TripleSubpackage;


class SetState
{
    private $var1;
    private $var2;

    function __construct()
    {
        $this->var1 = 100;
        $this->var2 = "hello";
    }

    public static function __set_state($an_array) // As of PHP 5.1.0
    {
        $obj = new SetState;
        $obj->var1 = $an_array['var1'];
        $obj->var2 = $an_array['var2'];
        return $obj;
    }
}
