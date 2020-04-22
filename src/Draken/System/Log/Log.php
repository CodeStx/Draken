<?php
namespace Draken\System\Log;

use Psr\Log\LoggerInterface;
use Psr\Log\AbstractLogger;
use Psr\Log\LogLevel;

class log extends AbstractLogger implements LoggerInterface
{
    /**
     * @inheritDoc
     */
    public function log(LogLevel $level, $message, $mixed = array())
    {
        $txt_node = $this->chlevel($level);
        $txt_msg = $txt_node . $message;
        Logger::log("$txt_msg");
    }

    public function alert_log($message)
    {
        $this->log(LogLevel::ALERT, $message);
    }

    private function chlevel(LogLevel $level) {
        switch ($level){
            case LogLevel::EMERGENCY:
                return (string) " [emergency]  ";
                break;
            case LogLevel::ALERT:
                return (string) " [alert]  ";
                break;
            case LogLevel::CRITICAL:
                return (string) " [critical]  ";
                break;
            case LogLevel::ERROR:
                return  (string) " [error]  ";
                break;
            case LogLevel::WARNING:
                return (string) " [warning]  ";
                break;
            case LogLevel::NOTICE:
                return  (string) " [notice]  ";
                break;
            case LogLevel::INFO:
                return (string) " [info]  ";
                break;
            case  LogLevel::DEBUG:
                return  (string) " [debug]  ";
                break;
        }
    }
}