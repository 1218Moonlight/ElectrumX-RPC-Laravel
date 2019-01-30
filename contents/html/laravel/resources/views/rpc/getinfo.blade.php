<?php

class getinfo
{
    private $socket;

    function __construct($ip, $port)
    {
        $this->socket = fsockopen($ip, $port, $errno, $errstr, 3);
    }

    function send()
    {
        fwrite($this->socket, '{"jsonrpc": "2.0", "id": null, "method": "getinfo", "params": []}');
        fwrite($this->socket, "\n");
        fflush($this->socket);
        $response = fgets($this->socket);
        echo $response;
    }
}

function main()
{
    $getinfo = new getinfo("ip", "port");
    $getinfo->send();
}

main();