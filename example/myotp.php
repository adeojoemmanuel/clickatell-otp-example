<?php
/**
 * @category   OTP messaging
 * @package    Clickatell OTP example
 * @author     Morne Zeelie <holla22@gmail.com>
 * @license    http://opensource.org/licenses/MIT  MIT License
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

*/

// enable the autoloader to make vendor classes available
require '../vendor/autoload.php';

//set your username and password for mysql
$username = 'root';
$password = '';
// Establish a connection
try {
    // Change the host & dbname to your own database settings
    $conn = new PDO('mysql:host=localhost;dbname=clickatell_otp', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

// initialize the random string class
$random = new Rych\Random\Random;

/*
 * if this is a POST with an email then a random string (OTP)
 * and store it in the username table to be retrieved later for
 * comparison.
 */
if (isset($_POST['email']))
{
    $randomString = $random->getRandomString(8); // generate the OTP string

    // Update the username table with the newly generated OTP string.
    $email = $_POST['email'];
    $randomString = str_replace(' ', '', $randomString);
    $data = $conn->query("UPDATE users
                          SET secret = {$conn->quote(base64_encode($randomString))}
                          WHERE email = {$conn->quote($email)}");

    // Do a query to get the users phone number, this is used to send the sms.
    $aDataQ = $conn->query("SELECT phone FROM users WHERE email = {$conn->quote($email)}");

    foreach ($aDataQ as $row)
    {
        $phone = $row['phone'];
    }

    // send the text/sms message with OTP to the users phone
    // replace the clickatell user details below with your account details.
    $oMyOTP = new Otp\Otp($username, $password, $apiId); //password:VXacglw1

    // the message was sent to the users mobile
    $oMyOTP->sendMessage($phone, 'Your OTP: ' . $randomString);

}


/*
 * At this point the user has submitted the OTP
 * and we can now compare the OTP given with the one stored in the database
 */
if (isset($_POST['otps']))
{
    $submitedOtp = $_POST['otps'];

    try
    {
        // query for the OTP, currently we are just quering for the secret to
        // make it simple. We should also query for the email to ensure uniqueness.
        $aDataOTP = $conn->query("SELECT secret FROM users WHERE secret = {$conn->quote(base64_encode($submitedOtp))}");

        foreach($aDataOTP as $row)
        {
            if(base64_decode( $row['secret'] ) == $_POST['otps'])
                // send out the password via email for the user.
                // you can add email functionality here.
                echo "It Matches, so send a email";
        }
    }
    catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}




?>