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
                                    <button type="submit" class="btn btn-default btn-sm pull-right">Submit</button>
                                 </div>
                            </form>
                            <div class="clearfix"></div>
                            <div id="response">
                                  <p><label>Country code: </label> <span class="cc"></span></p>
                                  <p><label>Country identifier: </label> <span class="isoalpha2"></span></p>
                                  <p><label>MNO identifier: </label> <span class="mno"></span></p>
                                  <p><label>Subscriber number: </label> <span class="mns"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        <script>
            $(document).ready(function() {
               
                $('form button').click(function(event) {
                    event.preventDefault();
                    
                    var encodedData = JSON.stringify ( {
                        "jsonrpc": "2.0",
                        "method": "find",
                        "params":  [$('form input[name="msisdn"]').val()],
                        "id": 0
                    }); 
                    $.ajax({
                        url: 'src/server.php',
                        dataType: 'json',
                        type: 'POST',
                        data: encodedData,
                        success: function(data, textStatus, jqXHR) {
                            
                            $("#response .cc").html(JSON.parse(JSON.stringify(data.result['cc']), null, 2));
                            $("#response .isoalpha2").html(JSON.parse(JSON.stringify(data.result['isoalpha2']), null, 2));
                            $("#response .mno").html(
                                JSON.parse(JSON.stringify(data.result['mno']), null, 2) + ' (' + 
                                JSON.parse(JSON.stringify(data.result['mnocode']), null, 2) + ')'
                              );
                            $("#response .mns").html(JSON.parse(JSON.stringify(data.result['isoalpha2']), null, 2));
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
