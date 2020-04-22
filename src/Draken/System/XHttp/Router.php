<?php
namespace Draken\System\XHttp;

class Router implements RoutableInterface
{
    protected $_controller;
    protected $_action;
    protected $_request;

    public function __construct(RequestInterface $request)
    {
        $this->_request = $request;
        $this->_controller = $this->_request->getController();
        $this->_action = $this->_request->getAction();
    }

    public function loadRouteMap()
    { }

    // TODO: Implement routeController() method.
    public function routeController()
    { }
}