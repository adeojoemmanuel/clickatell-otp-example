# Simple Clickatell OTP Example

This is an simple PHP example of how to create a OTP reminder for forgotten passwords on your website.

# Create a Clickatell account

* Go to  http://www.clickatell.com and create a Developers Central -> International account.
* Buy credits to be able to send out messages. You do get 10 free messages for testing but you can't change the text.
* You should have a default HTTP API created which you can access and get the API details to use in this example.

# Install via Composer

Available on Packagist here: https://packagist.org/packages/holla22/clickatell-otp

add the following to your composer.json file and run composer update command

```
require: "holla22/clickatell-otp": "dev-master"
```

# Usage Example
To send a sms we need to initialize our simple OTP class with our Clickatell HTTP API details

```php
// send the text/sms message with OTP to the users phone

// replace the clickatell user details below with your account details.
$oMyOTP = new Otp\Otp($username, $password, $apiId);
```

Send a text message to a mobile phone number

```php
// Use this to send a message to your user
$oMyOTP->sendMessage($mobileNO, $message);
```

The above is all you need to do to send out a simple text message.


# Example implementation of a simple OTP system.
Inside the Example folder you will have mysql folder with a SQL script to help you setup your database. 
It contains a user table and some example seed data.

In the example folder you will see two files myotp.php which contains the logic for the OTP system.

The login.php is the frontend website, an example of a forgot password page. On this page you can send a OTP to the mobile number of the user you've added in the user table of mysql. Just add the email of the user, click on the "Submit Email" button and it will send an sms with a random string to the users mobile number (International format without the + sign).

Take the random number you've received and enter it in the "Please provide your OTP" field and click on "Submit OTP" button. On line 108 of the myotp.php file you can add functionality to send the user it's new password.

# Usage in Laravel 5
Simply Install laravel 5 and add the following to the composer.json file.

```php
    "holla22/clickatell-otp": "dev-master",
		"curl/curl": "dev-master",
		"twbs/bootstrap": "3.3.*@dev",
		"rych/random": "1.0.*@dev",
		"guzzlehttp/guzzle": "~4.0"
```

Now run the composer update command to setup your newly added packages.

To use the clickatell OTP package in your controller simply add the following to the top of your controller file.

```php
  use Otp\Otp;
  use Rych\Random\Random;
```

At this point you can start using the Class like this:

```php
    // send the text/sms message with OTP to the users phone
    // replace the clickatell user details below with your account details.
    $oMyOTP = new Otp($username, $password, $apiId);

    // the message was sent to the users mobOile
    $oMyOTP->sendMessage($mobileno, $randomString );

```
