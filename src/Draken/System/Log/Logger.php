<?php
namespace Draken\System\Log;
use Draken\Service\Security\Filter;

class Logger
{
    /**
     * log()
     *
     * @param string $message
     * @param string|null $fileName
     */
    public static function log(string $message, string $fileName = null) {
        $fileName = ($fileName===null)? date('Y-m-d').'-app_dev.log' : $fileName;
        if (!file_exists($f_link = (APP_LINK . '/logs/' . $fileName))) {
            touch($f_link);
        }
        $log_s = '['.date('H:i:s'). ']    ' . Filter::utf8($message) . PHP_EOL;
        file_put_contents($f_link, $log_s, FILE_APPEND);
    }

    /**
     * load()
     *
     * @param string|null $file
     * @return false|string|null
     */
    public static function load(string $file = null) {
        $fileName = (!$file===null)? $file.'.log': date('Y-m-d').'-app_dev.log';
        if(!file_exists($f_link = (APP_LINK . '/logs' . $fileName))) {
            return file_get_contents($f_link);
        }
        return null;
    }
}