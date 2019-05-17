<?php
$currDir=dirname(__FILE__);
include("$currDir/incFunctions.php");
use PHPUnit\Framework\TestCase;
//use Notification;

final class NotificationTest extends TestCase{
	public function testSendmail(){
		Notification::placeholder();
		$correo = [ "subject" => "asunto", "message" => "hola", "name" => "Diana", "debug" => "nada",];
		
		$this->assertEquals(true, Notification::sendmail($correo));
	}

}
