<?php

   /**
   * @author Daniela Dimovska 
   */
   class Msisdn 
   {

       public function validateMsisdn($number)
       {

            $chars  = ['+','-',' ','/'];

            $msisdn = str_replace($chars, '', trim($number));

            if(substr($msisdn, 0, 2) == '00')
            {
                $msisdn = substr($msisdn, 2, strlen($msisdn));
            }

            if(strlen($msisdn) > 15)
            {
                return 'Invalid MSISDN number';
            }

            if(!is_numeric($msisdn))
            {
                return 'Invalid MSISDN number';
            }

            foreach($json->people as $item)
            {
                if($item->id == "8097")
                {
                    echo $item->content;
                }
            }
       }
   }
?>