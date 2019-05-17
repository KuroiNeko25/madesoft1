<?php if(!defined('PREPEND_PATH')) define('PREPEND_PATH', '../') ?>

<?php
$currDir=dirname(__FILE__);
include("$currDir/../lib.php");
include("$currDir/incFunctions.php");
use PHPUnit\Framework\TestCase;
//use Notification;

final class NotificationTest extends TestCase{
	public function testSendmail(){

		$correo = [ "name" => "Diana", "subject" => "asunto", "message" => "hola",  "debug" => "nada", ];
		//$correo = [ "to" => "dipaloz@gmail.com", "name" => "Diana", "subject" => "asunto", "message" => "hola",  "debug" => "nada", ];

		
		$this->assertEquals(false, sendmail($correo));
	}

}
