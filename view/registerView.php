<?php

class RegisterView {

	private static $registerMessage = 'RegisterView::Message';
	private static $registerurl = '?register';
	private static $register = 'register';
	private static $message = 'registerar då din fitta';
	private static $registerUserName = 'RegisterView::UserName';
	private static $registerPassword = 'RegisterView::Password';
	private static $registerPasswordRepeat = 'RegisterView::PasswordRepeat';
	private static $rekLink = 'RegisterView::regLink';
	private static $doRegistration = '';
	private  $registerLink;
	public $boofarGas = "kodden";

public function getRegisterLink(){
	return  '<a href='. self::$registerurl .'>Register a new user</a>' ;
}

public function doesUserWantsToRegister(){

	//var_dump(self::$boofarGas);
	if(isset($_GET[self::$register])){
		//$var = "hoj";
		//echo "hoj";
		return true;
	}
	else{
		$var = "hoj hoj";
		//var_dump($var);
		//echo "hoj hoj";
		return false;
	}
	
}

public function generateRegisterForm() {

	//var_dump($this->boofarGas);
		return '
    <h2>Register new user</h2>
      <form method="post" >
        <fieldset>
          <legend>Register a new user - Write username and password</legend>
          <p id="'. self::$message .'"></p>
					<label for="'. self::$registerUserName .'" >Username :</label>
					<input type="text" size="20" name='. self::$registerUserName .' id='. self::$registerUserName .' value="" />
					<br/>
					<label for="'. self::$registerPassword .'" >Password  :</label>
					<input type="password" size="20" name="'. self::$registerPassword .'" id="'. self::$registerPassword .'" value="" />
					<br/>
					<label for="'. self::$registerPasswordRepeat .'" >Repeat password  :</label>
					<input type="password" size="20" name="'. self::$registerPasswordRepeat .'" id="'. self::$registerPasswordRepeat .'" value="" />
					<br/>
					<input id="submit" type="submit" name="'. self::$doRegistration .'"  value="Register" />
					<br/>
        </fieldset>
      </form>
    ';
  
	}
}