<?php

use JsonRPC\Server;

require '../vendor/autoload.php';


    function cleanMsisdn($number)
    {

        $chars = ['+', '-', ' ', '/', '.'];

        $msisdn = str_replace($chars, '', (trim($number)));

        if(substr($msisdn, 0, 2) == '00')
        {
            $msisdn = substr($msisdn, 2, strlen($msisdn));
        }

        return $msisdn;
    
    }

	function isValid($number)
    {
        $msisdn = cleanMsisdn($number);
            
        $flag = true;

        if(!is_numeric($msisdn))
        {
            $flag = false;
        }

        if(strlen($msisdn) > 15)
        {
            $flag = false;
        }

        if(strlen($msisdn) < 8)
        {
            $flag = false;
        }

        return $flag;
    }


    function find($msisdn)
    {
        if(isValid($msisdn))
        {
            $msisdn = cleanMsisdn($msisdn);

        }else{

            $msg = new stdClass;

            $msg->Error = 'Invalid number';
            return json_encode($msg);
        }

        $data = json_decode(file_get_contents('../data/data.json'), true);
        
        foreach($data as $obj)
        {   
            if(($obj['cc'] == substr($msisdn, 0, 3)) && ($obj['mnocode'] == substr($msisdn, 3, 2)))
            {   
                $test = $obj;
                
            }
        }

        return $test;
    }



// $server = new Server();
// $server->getProcedureHandler()
//     ->withCallback('find', function (string $msisdn) : array {
// 		return find($msisdn);
// 	});

// echo $server->execute();

?>