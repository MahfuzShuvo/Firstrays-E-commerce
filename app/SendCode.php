<?php
namespace App;

require_once __DIR__ . '/../vendor/autoload.php';

use infobip\api\client\SendSingleTextualSms;
use infobip\api\configuration\BasicAuthConfiguration;
use infobip\api\model\sms\mt\send\textual\SMSTextualRequest;

class SendCode
{
	public static function sendCode($phone)
	{
		$code = rand(1111,9999);
		
		$client = new SendSingleTextualSms(new BasicAuthConfiguration('username', 'password'));

		$requestBody = new SMSTextualRequest();
		$requestBody->setFrom('First Rays');
		$requestBody->setTo('+88'.$phone);
		$requestBody->setText("Use ".$code." as One Time Password to continue with www.firstrays.com.bd");

		// $response = $client->execute($requestBody);
		try {
		    $response = $client->execute($requestBody);
		    $sentMessageInfo = $response->getMessages()[0];
		    echo "Message ID: " . $sentMessageInfo->getMessageId() . "\n";
		    echo "Receiver: " . $sentMessageInfo->getTo() . "\n";
		    echo "Message status: " . $sentMessageInfo->getStatus()->getName();
		} catch (Exception $exception) {
		    echo "HTTP status code: " . $exception->getCode() . "\n";
		    echo "Error message: " . $exception->getMessage();
		}


		return $code;
	}
}
