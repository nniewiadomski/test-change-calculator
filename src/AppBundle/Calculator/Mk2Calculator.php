<?php

declare(strict_types=1);

namespace AppBundle\Calculator;

use AppBundle\Calculator\MkCalculator;
use AppBundle\Model\Change;

class Mk2Calculator extends MkCalculator
{
    /**
     * @var string
     */
    public $model = "mk2";

    /**
     * @var array
     */
    public $changesAvailable = array(
                                    10=> "bill10",
                                    5 => "bill5",
                                    2 => "coin2"
                                );

}