<?php
/**
 * Created by PhpStorm.
 * User: liudas
 * Date: 18.3.16
 * Time: 12.02
 */
namespace Nfq\Academy\Homework\Subpackage\DoubleSubpackage;

class setGetIssetUnset
{
    private $title = "default";


    function __set($name, $value)
    {
        echo 'Sets parameter: '.$name.' to '.$value.PHP_EOL;
        $this->title = $value;
    }

    function __get($name)
    {
        if(isset($this->$name))
        {
            return $this->$name;
        }
        else
        {
            return 'Parameter '.$name.' does not exist.';
        }
    }

    function __isset($name)
    {
        echo 'Someone checked if '.$name.' exists'.PHP_EOL;
        return isset($this->$name);
    }

    function __unset($name)
    {
        echo 'Unsets '.$name.PHP_EOL;
        unset($this->$name);
    }
}


