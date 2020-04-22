<?php
namespace CodeStx\Draken\Component\HttpFoundation\Request;

class Request implements  RequestInterface
{
    const CHAR_ALLOWED = "/[^A-z0-9\/\^]/";

    private $_route = false;
    private $_server;
    private $_request;
    private $_action;
    private $_controller;
    private $_params;

    private $_gget;
    private $_gpost;
    private $_gcookie;

    public static function createFromGlobals() {
        return new Request();
    }

    public function __construct()
    {
        if  ($this->_route===false) {
            $this->_gget = &$_GET;
            $this->_gpost = &$_POST;
            $this->_gcookie = &$_COOKIE;

            $this->_server['request_uri'] = (string)$_SERVER['REQUEST_URI'];
            $this->_server['script_name'] = (string)$_SERVER['SCRIPT_NAME'];
            $this->_server['remote_addr'] = (string)$_SERVER['REMOTE_ADDR'];

            $this->parseRequestUri();

            $this->_route = true;
        }
    }

    public function parseRequestUri() {
        $http_req = preg_replace(self::CHAR_ALLOWED,"", $this->_server['request_uri']);
        $http_req = str_replace("^", "", $http_req);
        $tr_httpreq = ltrim($http_req, "/");
        $tr_httpreq = rtrim($tr_httpreq, "/");
        $this->_request = $tr_httpreq;
        $this->_params = explode("/", $tr_httpreq);
        $this->_controller = (isset($this->_params[0]))? $this->_params[0] : "defCtrll";
        $this->_action     = (isset($this->_params[1]))? $this->_params[1] : "defAct";
    }

    public function getAction() {
        return (string) $this->_action;
    }

    public function getController() {
        return (string) $this->_controller;
    }
}