<?php
/**
 * Created by PhpStorm.
 * User: liudas
 * Date: 18.3.16
 * Time: 15.44
 */

namespace Nfq\Academy\Homework;


class DebugInfo
{
    private $prop;
    private $secret;

    public function __construct($val, $val2) {
        $this->prop = $val;
        $this->secret = $val2;
    }

    public function __debugInfo() {
        return [
            'value1' => $this->prop,
            'value2Squared' => $this->prop ** 2,
        ];
    }
}

