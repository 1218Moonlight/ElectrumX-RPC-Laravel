<?php

namespace App\Libs;

class RPC
{
    private $socket;
    private $host = "ip";
    private $port = "8000";

    function __construct($errno = null, $errstr = null, $timeout = 3)
    {
        $this->socket = fsockopen($this->host, $this->port, $errno, $errstr, $timeout);
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