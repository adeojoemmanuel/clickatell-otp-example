<?php

/**
 * @category   OTP messaging
 * @package    Clickatell OTP example
 * @author     Morne Zeelie <holla22@gmail.com>
 * @license    http://opensource.org/licenses/MIT  MIT License
 * @link       https://github.com/holla22/clickatell-opt-example
 * @version    1.0.0
*/

/*

The MIT License (MIT)

Copyright (c) <year> <copyright holders>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*
*/

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Clickatell OTP Example</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <h1>Lost Your Password?</h1>

      </div>

        <div class="email-retreive">
            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1">@</span>
              <input type="text" class="form-control email" placeholder="Enter your registered email to retreive your password" aria-describedby="sizing-addon1">
            </div>
            <br>
            <button type="button" class="btn btn-primary btn-lg email-submit">Submit Email</button>
        </div>

        <br>

        <div class="email-retreive">
            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1">#</span>
              <input type="text" class="form-control specialcode" placeholder="Please provide your OTP that was sent to your mobile?" aria-describedby="sizing-addon1">
            </div>
            <br>
            <button type="button" class="btn btn-primary btn-lg opt-submit">Submit OTP</button>
        </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript">


        //console.log(emailsend);
        $( ".email-submit" ).on( "click", function() {
          var emailsend = $( "input.email" ).val();
            $.post( "myotp.php", { email: emailsend })
              .done(function( data ) {
                console.log( data);
              });
        });



        $( ".opt-submit" ).on( "click", function() {
           var otpsend = $( ".specialcode" ).val();
/*          console.log( 'CLICK OTP' );
          console.log(otpsend);*/
            $.post( "myotp.php", { otps: otpsend })
              .done(function( data ) {
                console.log( data);
              });
        });

    </script>
  </body>
</html>
