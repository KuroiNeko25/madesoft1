<?php if(!defined('PREPEND_PATH')) define('PREPEND_PATH', '../') ?>

<?php
$currDir=dirname(__FILE__);
include("$currDir/incFunctions.php");
use PHPUnit\Framework\TestCase;
//use Notification;

final class NotificationTest extends TestCase{
	public function testSendmail(){
		$adminConfig = config('adminConfig');
		$correo = [ "to" => "dipaloz@gmail.com", "name" => "Diana", "subject" => "asunto", "message" => "hola",  "debug" => "nada", ];
		
		$this->assertEquals(true, sendmail($correo));
	}

}
