<?php

declare(strict_types=1);

namespace AppBundle\Calculator;

use AppBundle\Calculator\MkCalculator;
use AppBundle\Model\Change;

class Mk1Calculator extends MkCalculator
{
    /**
     * @var string
     */
    public $model = "mk1";
    /**
     * @var array
     */
    public $changesAvailable = array( 1 => "coin1");

}