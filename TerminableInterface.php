<?php
namespace Draken\System\Kernel;

use Draken\System\XHttp\RequestInterface;
use Draken\System\XHttp\RoutableInterface;

interface TerminableInterface
{
    /**
     * Terminates a request/response cycle.
     *
     * Should be called after sending the response and before shutting down the kernel.
     */
    function terminate(RequestInterface $request, RoutableInterface $response);
}