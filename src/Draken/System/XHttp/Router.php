<?php
namespace Draken\System\XHttp;

class Router
{
    protected $_controller;
    protected $_action;
    protected $_request;

    public function __construct(RequestInterface $request)
    {
        $this->_request = $request;
        $this->_controller = $this->_request->getController();
        $this->_action = $this->_action->getAction();
    }

    public function loadRouteMap()
    {

    }
}