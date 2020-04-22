<?php
namespace Draken\System\XHttp;
interface RequestInterface
{
    public static function createFromGlobals();
    public function parseRequestUri();
}