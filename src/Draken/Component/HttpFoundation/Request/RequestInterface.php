<?php
namespace CodeStx\Draken\Component\HttpFoundation\Request;

interface RequestInterface
{
    public static function createFromGlobals();
    public function parseRequestUri();
}