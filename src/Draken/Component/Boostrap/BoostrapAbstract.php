<?php
namespace CodeStx\Draken\Component\Boostrap;

abstract class BoostrapAbstract
{
    protected $_ioc;
    protected $_boosted = array();

    public function __construct($ioc)
    {
        $this->_ioc = $ion;
    }

    public function boost()
    {
        foreach($this->_boosted as $service) {
            $proc = '_'.$service;
            $this->$proc($this->_ioc);
        }
    }
}
