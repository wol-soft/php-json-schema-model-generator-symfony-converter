<?php

declare(strict_types=1);

namespace App\Event;

use PHPModelGenerator\Exception\JSONModelValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class ExceptionListener
{
    public function onKernelException(ExceptionEvent $event)
    {
        if (!$event->getThrowable() instanceof JSONModelValidationException) {
            return;
        }

        $response = new Response($event->getThrowable()->getMessage(), 400);

        $event->setResponse($response);
    }
}
