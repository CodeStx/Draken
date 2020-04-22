<?php
namespace CodeStx\Draken\Component\HttpFoundation\Router;

interface RoutableInterface
{
    public function loadRouteMap();
    public function routeController();
}