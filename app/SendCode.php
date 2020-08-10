<?php
namespace App;
class SendCode
{
	public static function sendCode($phone)
	{
		$code = rand(1111,9999);
		$nexmo = app('Nexmo\Client');
		$nexmo->message()->send([
			'to' => '+880'.(int) $phone,
			'from' => 'First Rays',
			'text' => 'Use '.$code.' as your verification code for First Rays.',
		]);
		return $code;
	}
}