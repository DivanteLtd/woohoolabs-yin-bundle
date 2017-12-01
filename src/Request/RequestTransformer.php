<?php

namespace Divante\WoohoolabsYinBundle\Request;

use Psr\Http\Message\ServerRequestInterface;
use Symfony\Bridge\PsrHttpMessage\Factory\DiactorosFactory;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class RequestTransformer
 */
class RequestTransformer
{
    /**
     * @var RequestStack
     */
    protected $stack;

    /**
     * @var DiactorosFactory
     */
    protected $factory;

    /**
     * RequestTransformer constructor.
     * @param RequestStack $stack
     * @param DiactorosFactory $factory
     */
    public function __construct(RequestStack $stack, DiactorosFactory $factory)
    {
        $this->stack = $stack;

        $this->factory = $factory;
    }

    /**
     * @return ServerRequestInterface
     */
    public function getPsr7Request(): ServerRequestInterface
    {
        $symfonyRequest = $this->stack->getCurrentRequest();

        return $this->factory->createRequest($symfonyRequest);
    }
}
