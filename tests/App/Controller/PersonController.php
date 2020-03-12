<?php

namespace App\Controller;

use App\Model\Person;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PersonController
 *
 * @package App\Controller
 */
class PersonController extends AbstractController
{
    /**
     * @Route("/", methods="POST", name="person_index")
     */
    public function testAction(Person $person): Response
    {
        return new Response("{$person->getName()}: {$person->getAge()}");
    }
}
