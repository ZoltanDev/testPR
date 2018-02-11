<?php

use JsonRPC\Server;

include 'parser.php';

$server = new Server();

$server->getProcedureHandler()
    ->withCallback('find', function ($number) {
        return find($number);
    });

echo $server->execute();

?>