<?php

use App\Libs\rpc;

function main()
{
    $rpc = new RPC();
    $sessions = $rpc->send("sessions");
    echo $sessions;

}

main();