<?php

use App\Libs\rpc;

function main()
{
    $rpc = new RPC("ip", "port");
    $getinfo = $rpc->send("getinfo");
    echo $getinfo;

}

main();