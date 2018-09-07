<?php

declare(strict_types=1);

namespace AppBundle\Registry;

use AppBundle\Registry\CalculatorRegistryInterface;
use AppBundle\Calculator\CalculatorInterface;

class CalculatorRegistry implements CalculatorRegistryInterface
{
    /**
     * @var array
     */
    public $calculatorsAvailable = array(
                                            "\AppBundle\Calculator\Mk1Calculator",
                                            "\AppBundle\Calculator\Mk2Calculator"
                                        );

    /**
     * @param string $model Indicates the model of automaton
     *
     * @return CalculatorInterface|null The calculator, or null if no CalculatorInterface supports that model
     */
    public function getCalculatorFor(string $model): ?CalculatorInterface
    {
        foreach($this->calculatorsAvailable as $calculatorAvailable)
        {
            $calculator=new $calculatorAvailable;

            if($model == $calculator->getSupportedModel())
            {
                return $calculator;
            }
        }

        return null;
    }
}