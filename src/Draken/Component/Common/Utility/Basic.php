<?php
namespace CodeStx\Draken\Component\Common\Utility;

class Basic
{
    public static function prt(array $arr = array()) {
        print_r("<pre>");
        print_r($array);
        print_r("</pre>");
    }   

    public static function backtrace()
    {
        static::pre(debug_print_backtrace());
    }

    public static function path()
    {
        print_r(getcwd());
    }
}