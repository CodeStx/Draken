<?php
namespace CodeStx\Draken\Component\Container\DI;

use CodeStx\Draken\Component\Container\Exceptions\DIException as DIExcept;

class DI
{    
    protected static $_data = array();

    public function __get($name) {
        $model = $this->get($name);
        return $model;
    }

    public function __set($name, $value) {
        $this->set($name, $value);
    }

    public function __call($name, $args) {
        if (is_callable(self::$_data[$name])) {
            $cal = self::$_data[$name];
            self::$_data[$name] = $cal($args);
        }
        elseif (is_string(self::$_data[$name])) {
            $rc = new \ReflectionClass(self::$_data[$name]);
            self::$_data[$name] = $rc->newInstanceArgs($args);
            return self::$_data[$name];
        }
        elseif (!isset(self::$_data[$name])) {
            throw new DIExcept("DI: " .$name. " not found!");
        }
        else {
            throw new DIExcept("DI: " .$name. " can't be used!");
        }
    }

    public function delete($name) {
        if($this->has($name)) {
            unset(self::$_data[$name]);
        }

        return $this;
    }

    public function has($name) {
        return isset(self::$_data[$name]);
    }

    public function set($name, $value) {
        self::$_data[$name] = $value;
        return $this;
    }

    public function get($name) {
        if (!isset(self::$_data[$name])) {
            throw new DIExcept('DI: ' . $name . ' not found!');
        } elseif(is_callable(self::$_data[$name])) {
            $cal = self::$_data[$name];
            self::$_data[$name] = $cal();
        } elseif(is_string(self::$_data[$name])) {
            self::$_data[$name] = new self::$_data[$name]();
        } elseif (is_array(self::$_data[$name])) {
            $rc = new \ReflectionClass(self::$_data[$name][0]);
            self::$_data[$name] = $rc->newInstanceArgs(self::$_data[$name][1]);
        } else {
        }

        return self::$_data[$name];
    }

    public function getValue($name) {
        return self::$_data[$name];
    }

    public function getAll($run = false) {
        if (false===$run) return self::$_data;

        $data = array();
        $keys = array_keys(self::$_data);
        foreach ($keys as $key) {
            $data[$key] = $this->get($key);
        }

        return $data;
    }
}