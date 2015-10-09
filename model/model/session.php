<?php 

class Session{

 	private static $USERNAME_SESSION ="USERNAME";
 	private static $RETMESSAGE_SESSION ="";
 	private $username;
 	
 	public function __construct(){
 		session_start();
 	}
 	
 	public function setUserNameIsSession($UserName){

 		$_SESSION[self::$USERNAME_SESSION] = $UserName;
 		//var_dump($_SESSION[self::$USERNAME_SESSION]);
 	}

 	public function getSessionUserName(){
 		//var_dump($_SESSION[self::$USERNAME_SESSION]);
 		return $_SESSION[self::$USERNAME_SESSION];
 		//session_destroy();
 	}

 	public function setSessionRetMessage($message){
 		//var_dump($message);
 		$_SESSION[$RETMESSAGE_SESSION] = $message;
 		//var_dump($_SESSION[self::$USERNAME_SESSION]);
 	}

 	public function getSessionRetMessage(){
 		//var_dump($_SESSION[self::$USERNAME_SESSION]);
 		return $_SESSION[$RETMESSAGE_SESSION];
 		//session_destroy();
 	}
}