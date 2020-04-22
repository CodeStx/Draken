<?php
namespace CodeStx\Draken\Component\HttpKernel;


interface TerminableInterface
{
    /**
     * Terminates a request/response cycle.
     *
     * Should be called after sending the response and before shutting down the kernel.
     */
    //function terminate(RequestInterface $request, RoutableInterface $response);
}