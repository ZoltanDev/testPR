<?php

use JsonRPC\Server;

$server = new Server();
$server->getProcedureHandler()
    ->withCallback('test', function ($a) {
        return test($a);
    });

echo $server->execute();

?>