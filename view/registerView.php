<?php

class RegisterView {

	private static $registerMessage = 'RegisterView::Message';
	private static $registerurl = '?register';
	private static $backURL = '?';
	private static $register = 'register';
	private static $message = 'RegisterView::Message';
	private static $registerUserName = 'RegisterView::UserName';
	private static $registerPassword = 'RegisterView::Password';
	private static $registerPasswordRepeat = 'RegisterView::PasswordRepeat';
	private static $rekLink = 'RegisterView::regLink';
	private static $doRegister = 'RegisterView::doRegister';
	private static $ResponsText;
	private static $doRegistration = '';
	private  $registerLink;
	private $regstate;
	//public $boofarGas = "kodden";



public function doesUserWantsToRegister(){

	//var_dump(self::$boofarGas);
	if(isset($_GET[self::$register])){
		//$var = "

		return true;
	}
	else{
		return false;
	}
	
}


public function getRegisterLink(){
	//var_dump($this->rekLink);
	if(!$this->doesUserWantsToRegister() == true){
		return  '<a href='. self::$registerurl .'>Register a new user</a>' ;
	}
	else{
		return '<a href='. self::$backURL .'>Back to login</a>';
	}
	// }
	// else{
	// 	return  '<a href='. self::$backURL .'>Register a new user</a>' ;
	// }
	
	
}

public function changeResponseMessage($mess){
		//var_dump($mess);
	$this->ResponsText = $mess;

	//var_dump(self::$message);
	$this->generateRegisterForm();	
}
public function generateRegisterForm() {
	//$this->regstate = false;
	//
	//var_dump(self::$message);
	//var_dump($this->boofarGas);
		return '
    <h2>Register new user</h2>
      <form method="post" >
        <fieldset>
          <legend>Register a new user - Write username and password</legend>
          <p id="'. self::$message .'">'.$this->ResponsText.'</p>
					<label for="'. self::$registerUserName .'" >Username :</label>
					<input type="text" size="20" name='. self::$registerUserName .' id='. self::$registerUserName .' value="" />
					<br/>
					<label for="'. self::$registerPassword .'" >Password  :</label>
					<input type="password" size="20" name="'. self::$registerPassword .'" id="'. self::$registerPassword .'" value="" />
					<br/>
					<label for="'. self::$registerPasswordRepeat .'" >Repeat password  :</label>
					<input type="password" size="20" name="'. self::$registerPasswordRepeat .'" id="'. self::$registerPasswordRepeat .'" value="" />
					<br/>
					<input id="submit" type="submit" name="'. self::$doRegister .'"  value="Register" />
					<br/>
        </fieldset>
      </form>
    ';

  
	}
	public function getRegistrationUserName(){
		if(isset($_POST[self::$registerUserName]) ){
			return  $_POST[self::$registerUserName];
 		}
 		else{
 			return false;
 		}
	}

	public function getRegistrationPassword(){
		if(isset($_POST[self::$registerPassword]) ){
			return  $_POST[self::$registerPassword];
 		}
 		else{
 			return false;
 		}

	}

	public function getRegistrationRepeatPassword(){
		if(isset($_POST[self::$registerPasswordRepeat]) ){
			return  $_POST[self::$registerPasswordRepeat];
 		}
 		else{
 			return false;
 		}

	}

	public function checkIfUserWantsToRegister(){
		//var_dump(isset($_GET[self::$doRegister]));
		//var_dump(self::$doRegister);
		if(isset($_POST[self::$doRegister])){
			return true;
		}
		return false;
	}
}