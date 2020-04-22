<?php
namespace Draken\System\Log;

use Psr\Log\LogLevel;

class Log
{
    private function chlevel($level) {
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

    private function _log($level, $message, array $mixed = array())
    {
        $txt_node = $this->chlevel($level);
        $txt_msg = $txt_node . $message;
        Logger::log("$txt_msg");
    }


    public function emergency($message)
    {
        $this->_log(LogLevel::EMERGENCY, $message);
    }

    public function alert($message)
    {
        $this->_log(LogLevel::ALERT, $message);
    }

    public function critical($message)
    {
        $this->_log(LogLevel::CRITICAL, $message);
    }

    public function error($message)
    {
        $this->_log(LogLevel::ERROR, $message);
    }

    public function warning($message)
    {
        $this->_log(LogLevel::WARNING, $message);
    }

    public function notice($message)
    {
        $this->_log(LogLevel::NOTICE, $message);
    }

    public function info($message)
    {
        $this->_log(LogLevel::INFO, $message);
    }

    public function debug($message)
    {
        $this->_log(LogLevel::DEBUG, $message);
    }
}