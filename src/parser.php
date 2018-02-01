<?php

use JsonRPC\Server;


require '../vendor/autoload.php';

 function test($msisdn)
{	
	
	return json_decode(file_get_contents('../data/data.json'));	
}


$server = new Server();
$server->getProcedureHandler()
    ->withCallback('test', function (string $msisdn) : array {
		return test($number);
	});

echo $server->execute();

?>