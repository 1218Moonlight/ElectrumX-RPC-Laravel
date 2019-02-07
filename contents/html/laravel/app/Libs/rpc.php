<?php

namespace App\Libs;

class RPC
{
    private $socket;

    function __construct($host, $port, $errno = null, $errstr = null, $timeout = 3)
    {
        $this->socket = fsockopen($host, $port, $errno, $errstr, $timeout);
    }

    public function send($method, $param = "")
    {
        fwrite($this->socket, '{"jsonrpc": "2.0", "id": null, "method": "' . $method . '", "params": [' . $param . ']}');
        fwrite($this->socket, "\n");
        fflush($this->socket);
        $response = fgets($this->socket);
        return $response;
    }
}