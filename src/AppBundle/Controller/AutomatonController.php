<?php

declare(strict_types=1);

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Registry\CalculatorRegistry;

class AutomatonController extends Controller
{

    /**
     * @Route("/automaton/{model}/change/{change}", name="app_automaton")
     */
    public function getChange($model, $change)
    {

        $calculatorRegistry=new CalculatorRegistry();

        $calculator=$calculatorRegistry->getCalculatorFor($model);
        if($calculator == null)
        {
            return new Response ( '<html><body>model: '.$model.' not found</body></html>', 404);
        }

        $changeTypes=$calculator->getChange((int)$change);
        if($changeTypes == null)
        {
            return new Response ( '<html><body>cant change : '.$change.' with model: '.$model.' not found</body></html>', 204);
        }

        return new Response(
            var_dump($changeTypes)
        );
    }
}
