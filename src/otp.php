<?php
/**
 *
 * PHP Version 5.3
 *
 * @category   OTP messaging
 * @package    Clickatell OTP example
 * @author     Morne <holla22@gmail.com>
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

*/

namespace Otp;

use Curl;

class Otp {

    protected $user;
    protected $password;
    protected $apiId;

    // simple constructor method to make it easier to run this OTP Class
    public function __construct ( $User, $Password, $ApiId ) {
        $this->user = $User;
        $this->password = $Password;
        $this->apiId = $ApiId;
    }

    // send text message to a mobile number using HTTP API from Clickatell.com
    public function sendMessage ( $NoToMessage, $Message)
    {

        $curl = new Curl\Curl();
        $curl->get("http://api.clickatell.com/http/sendmsg?user={$this->user}&password={$this->password}&api_id={$this->apiId}&to={$NoToMessage}&text={$Message}");

        if ($curl->error) {
            echo $curl->error_code;
        }
        else {
            echo $curl->response;
        }

    }

}

?>