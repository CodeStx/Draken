<?php
namespace Draken\Common\Utility;

class Base
{
    public static function pre($content)
    {
        print_r("<pre>");
        print_r($content);
        print_r("</pre>");
    }

    public static function backtrace()
    {
        static::pre(debug_print_backtrace());
    }

    public static function path()
    {
        return getcwd();
    }
}