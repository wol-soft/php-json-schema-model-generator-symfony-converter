<?php

declare(strict_types = 1);

namespace PHPModelGenerator\Bundle\ParamConverter;

use PHPModelGenerator\Exception\JSONModelValidationException;
use PHPModelGenerator\Interfaces\JSONModelInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class JSONModelConverter
 *
 * @package PHPModelGenerator\Bundle\ParamConverter
 */
class JSONModelConverter implements ParamConverterInterface
{
    /**
     * Stores the object in the request.
     *
     * @param Request $request
     * @param ParamConverter $configuration Contains the name, class and options of the object
     *
     * @return bool True if the object has been successfully set, else false
     *
     * @throws JSONModelValidationException
     */
    public function apply(Request $request, ParamConverter $configuration)
    {
        $requestModelClass = $configuration->getClass();

        $request->attributes->set(
            $configuration->getName(),
            new $requestModelClass(json_decode($request->getContent(), true) ?? [], true)
        );

        return true;
    }

    /**
     * Checks if the object is supported.
     *
     * @param ParamConverter $configuration
     *
     * @return bool True if the object is supported, else false
     */
    public function supports(ParamConverter $configuration)
    {
        return is_a($configuration->getClass(), JSONModelInterface::class, true);
    }
}
