<?php
namespace Draken\System\Config;

class config
{
    public $_name;

    protected static $_conf = array();

    public static function load($nameConfig) {
        return new config($nameConfig);
    }

    public function __construct($name) {
        $this->_name = $name;
        if (!isset(self::$_conf[$name])) {
            if (file_exists($f_link = (APP_LINK . '/config' . '/' . $name . '.php'))) {
                self::$_conf[$name] = include($f_link);
            }
        }
    }

    public function clear() {
        if (isset(self::$_conf[$this->name])) {
            unset(self::$_conf[$this->name]);
        }

        return$this;
    }

    public function has($param) {
        return isset(self::$_conf[$this->_name][$param]);
    }

    public function set($key, $value) {
        self::$_conf[$this->_name][$key] = $value;
        return $this;
    }

    public function get($param, $or = null) {
        return ( isset( self::$_conf[ $this->_name ][ $param ] ) )? self::$_conf[ $this->_name ][ $param ] : $or;
    }

    public function getAll() {
        return self::$_conf[$this->_name];
    }

}