<?php
namespace Draken\System\Bootstrap;

abstract class BootstrapAbstraction
{
    protected $_di;
    protected $_boost = array();

    public function __construct($di)
    {
        $this->_di = $di;
    }

    public function boost()
    {
        foreach ($this->_boost as $service) {
            $proces = '_'.$service;
            $this->$proces($this->_di);
        }
    }
}