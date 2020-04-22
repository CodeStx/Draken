<?php
namespace Draken\Service\Profiler;

class Benchmark
{
    protected $_data = array();

    public function start($pointName = 'fhhh')
    {
        $this->_data[$pointName]['memory'] = memory_get_usage();
        $this->_data[$pointName]['time'] = microtime(true);
    }

    public function stop($pointName = 'fhhh', $dec = 5)
    {
        $this->_data[$pointName]['memory'] = memory_get_usage() - $this->_data[$pointName]['memory'];
        $this->_data[$pointName]['time'] = number_format(microtime(true) - $this -> _data[ $pointName ]['time'], $dec);
    }

    public function get($pointName = 'fhhh')
    {
        $rn = $this -> _data[ $pointName ];
        unset($this -> _data[ $pointName ]);
        return $rn;
    }

    public function getAll()
    {
        $rn = $this -> _data;
        $this -> _data = array();
        return $rn;
    }
}