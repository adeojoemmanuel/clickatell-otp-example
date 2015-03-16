<?php
/**
 * The Clickatell SMS Library provides a standardised way of talking to and
 * receiving replies from the Clickatell API's.
 *
 * PHP Version 5.3
 *
 * @package  Clickatell
 * @author   Morne <holla22@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://github.com/holla22
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