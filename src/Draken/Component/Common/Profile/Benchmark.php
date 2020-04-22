<?php
namespace CodeStx\Draken\Componen\Common\Profile;

class Benchmark
{
    protected $_marks = array();
    
    public function start($nameMarker = 'draken')
    {        
        $this->_marks[$nameMarker]['memory'] = memory_get_usage();
        $this->_marks[$nameMarker]['time'] = microtime(true);
    }

    public function stop($nameMarker = 'draken', $dec = 5)
    {         
        $this->_marks[$nameMarker]['memory'] = memory_get_usage() - $this->_marks[$nameMarker]['memory'];
        $this->_marks[$nameMarker]['time'] = number_format(microtime(true) - $this->_marks[$nameMarker]['time'], $dec);
    }

    public function get($nameMarker = 'draken')
    {        
        $_out = $this->_marks[$nameMarker];
        unset($this->_marks[$nameMarker]);
        return $_out;
    }

    public function getAll()
    {        
        $_out = $this->_marks;
        $this->_marks = array();
        return (array) $_out;
    }
}