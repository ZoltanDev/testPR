<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MSISDN Number</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">  

        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>         
    </head>
    <body>

        <nav class="navbar navbar-default">

            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">MSISDN Number</a>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form>

                                 <div class="form-group">
                                   <label for="msisdn">Type a MSISDN number:</label>
                                   <input type="text" class="form-control input-sm" name="msisdn">
                                 </div>

                                 <div class="form-group">
                                    <button type="submit" class="btn btn-default btn-sm">Submit</button>
                                 </div>
                            </form>
                            <div id="response">Rezultat:</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php

             function validateMsisdn($number){
            $number = '38165425698';
            $chars = ['+','-',' ','/'];
            $msisdn = str_replace($chars, '', (trim($number)));

            if(substr($msisdn,0,2) == '00'){
                $msisdn = substr($msisdn, 2, strlen($msisdn));
            }

            $data = json_decode(file_get_contents('data/data.json'), true);
            
            // print_r($data) ;
            foreach($data as $obj)
            {   
                if(($obj['cc'] == substr($msisdn, 0, 3)) && ($obj['mnocode'] == substr($msisdn, 3, 2)))
                {   
                    $test = $obj;
                    // echo $msisdn;
                }
            }

            return $test['cc'].' '.$test['isoalpha2'].' '.$test['mno'];
       }

       echo validateMsisdn(123);
        ?>
        
            <script>

                $(document).ready(function() {
                   
                    $('form button').click(function(event) {
                        event.preventDefault();
                        
                        var encodedData = JSON.stringify ( {
                            "jsonrpc": "2.0",
                            "method": "test",
                            "params":  [$('form input[name="msisdn"]').val()],
                            "id": 15324815
                        }); 
                        $.ajax({
                            url: 'src/parser.php',
                            dataType: 'json',
                            type: 'POST',
                            data: encodedData,
                            success: function(data, textStatus, jqXHR) {
                                
                                $("#response").html(JSON.stringify(data.result[0], null, 2));
                            },
                            error: function(jqXHR, textStatus, errorThrow) {

                                $("#response").html('ERROR: ' + errorThrow);
                            },
                             headers:{
                                "Content-Type": "application/json-rpc"
                            }
                        });
                    });
                });
            </script>
            
    </body>
</html>
