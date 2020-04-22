<?php
namespace Draken\Service\Security;

class Filter
{
    /**
     * xss data filter
     *
     * @param string $s_enter data to filter
     * @return string
     */
    public static function xss(string $s_enter) {
        return htmlspecialchars($s_enter, ENT_QUOTES, 'UTF-8');
    }

    /**
     * utf8 data filter
     *
     * @param string $s_enter data to filter
     * @return string
     */
    public static function utf8(string $s_enter) {
        return @iconv("utf-8", "utf-8//IGNORE", $s_enter);
    }
}