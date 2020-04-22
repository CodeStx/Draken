<?php
namespace Draken\System\XHttp;

interface RoutableInterface
{
    public function loadRouteMap();
    public function routeController();
}