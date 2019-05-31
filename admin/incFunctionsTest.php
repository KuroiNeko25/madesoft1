<?php if(!defined('PREPEND_PATH')) define('PREPEND_PATH', '../') ?>

<?php
$currDir=dirname(__FILE__);
include("$currDir/../lib.php");
include("$currDir/incFunctions.php");
use PHPUnit\Framework\TestCase;
//use Notification;

final class NotificationTest extends TestCase{
	public function testSendmail(){

		//$correo = [ "name" => "Diana", "subject" => "asunto", "message" => "hola",  "debug" => "nada", ];
		$correo = [ "to" => "dipaloz", "name" => "Diana", "subject" => "asunto", "message" => "hola",  "debug" => "nada", ];

		
		$this->assertEquals(true, sendmail($correo));
	}
	
	public function testShow(){
		$opt = array();		
		$this->assertEquals('<bar><foo/></bar>', show($opt));
	}


}

