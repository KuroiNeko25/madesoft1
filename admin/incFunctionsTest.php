<?php
include("$currDir/incFunctions.php");
use PHPUnit\Framework\TestCase;
//use Notification;

final class NotificationTest extends TestCase{
	public function testSendmail(){
		$miObj = new Notification();
		
		$correo = [ "subject" => "asunto", "message" => "hola", "name" => "Diana", "debug" => "nada",];
		
		$this->assertEquals(true, $miObj->sendmail($correo));
	}

}
