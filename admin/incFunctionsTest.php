<?php if(!defined('PREPEND_PATH')) define('PREPEND_PATH', '../') ?>

<?php
$currDir=dirname(__FILE__);
include("$currDir/incFunctions.php");
use PHPUnit\Framework\TestCase;
//use Notification;

final class NotificationTest extends TestCase{
	public function testSendmail(){
		
		$correo = [ "subject" => "asunto", "message" => "hola", "name" => "Diana", "debug" => "nada",];
		
		$this->assertEquals(true, sendmail($correo));
	}

}
