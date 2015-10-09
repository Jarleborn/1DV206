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
	private  $ResponsText;
	private static $doRegistration = '';
	private  $registerLink;
	private $regstate;
	private $SessionModel;

public function __construct(Session $SessionModel){
	$this->SessionModel = $SessionModel;

}

public function doesUserWantsToRegister(){

	if(isset($_GET[self::$register])){
		return true;
	}
	else{
		return false;
	}
	
}


public function getRegisterLink(){
	if(!$this->doesUserWantsToRegister() == true){
		return  '<a href='. self::$registerurl .'>Register a new user</a>' ;
	}
	else{
		return '<a href='. self::$backURL .'>Back to login</a>';
	}	
}

public function changeResponseMessage($mess){
	//var_dump($mess);
	$this->ResponsText = $mess;
	$this->generateRegisterForm();	
}

public function getResponseText(){
	return $this->ResponsText;
}
public function generateRegisterForm() {
		return '
    <h2>Register new user</h2>
      <form method="post" >
        <fieldset>
          <legend>Register a new user - Write username and password</legend>
          <p id="'. self::$message .'">'.$this->ResponsText.'</p>
					<label for="'. self::$registerUserName .'" >Username :</label>
					<input type="text" size="20" name='. self::$registerUserName .' id='. self::$registerUserName .' value="'.$this->getStripedUserName().'" />
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
			$this->SessionModel->setUserNameIsSession($_POST[self::$registerUserName]);
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
		if(isset($_POST[self::$doRegister])){
			return true;
		}
		return false;
	}

	public function getStripedUserName(){
			if(isset($_POST[self::$registerUserName])){
				$this->SessionModel->setUserNameIsSession(strip_tags($_POST[self::$registerUserName]));
				return strip_tags($_POST[self::$registerUserName]);
			}
			return "";	
	}
}