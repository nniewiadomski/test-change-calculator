<?php

declare(strict_types=1);

namespace AppBundle\Calculator;

use AppBundle\Calculator\CalculatorInterface;
use AppBundle\Model\Change;

class MkCalculator implements CalculatorInterface
{
    /**
     * @var string
     */
    public $model = "mk";

    /**
     * @return string Indicates the model of automaton
     */
    public function getSupportedModel(): string
    {
        return $this->model;
    }

    /**
     * @param int $amount The amount of money to turn into change
     *
     * @return Change|null The change, or null if the operation is impossible
     */
    public function getChange(int $amount): ?Change
    {
        $change= new Change();
        $changeFound=false;
        krsort($this->changesAvailable);

        foreach($this->changesAvailable as $changeValue => $changeType)
        {
            if($amount / $changeValue >= 1)
            {
                $nbChange=floor($amount / $changeValue);
                $change->$changeType = $nbChange;
                $amount=$amount - ($changeValue * $nbChange);
                if($amount==0)
                {
                    $changeFound=true;
                }
            }
        }

        if(!$changeFound)
        {
            return null;
        }

        return $change;
    }
}