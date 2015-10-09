<?php

class LoginView {
	private static $login = 'LoginView::Login';
	private static $logout = 'LoginView::Logout';
	private static $name = 'LoginView::UserName';
	private static $password = 'LoginView::Password';
	private static $cookieName = 'LoginView::CookieName';
	private static $cookiePassword = 'LoginView::CookiePassword';
	private static $keep = 'LoginView::KeepMeLoggedIn';
	private static $messageId = 'LoginView::Message';
	private  $Session;
	public $LogInModel;
	public $userNameHolder;
	public $userInputUsername;
	public $response;
	private $messsage;


	public function __construct(LogInModel $LogInModel, Session $Session){
		$this->LogInModel = $LogInModel;
		$this->Session = $Session;
	}
	/**
	 * Create HTTP response
	 *
	 * Should be called after a login attempt has been determined
	 *
	 * @return  void BUT writes to standard output and cookies!
	 */
	

	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	public function setMessage($mes){
		if($this->Session->getSessionRetMessage() != ""){
			return $this->message = $this->Session->getSessionRetMessage();
		}
		return $this->message = $mes;
	}

	//Här va de private innan
	public function generateLogoutButtonHTML($message) {
		return '
			<form  method="post" >
				<p id="' . self::$messageId . '">' . $message .'</p>
				<input type="submit" name="' . self::$logout . '" value="logout"/>
			</form>
		';
	}

	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/

	//Här va de private innan
	public function generateLoginFormHTML($message) {
		return '
			<form method="post" >
				<fieldset>
					<legend>Login - enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $this->setMessage($message) . '</p>

					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="'.$this->Session->getSessionUserName() .'" />

					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />

					<label for="' . self::$keep . '">Keep me logged in  :</label>
					<input type="checkbox" id="' . self::$keep . '" name="' . self::$keep . '" />

					<input type="submit" name="' . self::$login . '" value="login" />
				</fieldset>
			</form>
		';
	}


	public function GetUserName(){
		if( isset($_POST[self::$name])){
		$this->userInputUsername = $_POST[self::$name];
		return  $_POST[self::$name];
 		}
 		else
 		{
 			return false;
 		}

	}

	public function GetPassword(){
		if(isset($_POST[self::$password]) ){
			return  $_POST[self::$password];
 		}
 		else{
 			return false;
 		}
	}
	public function Checklogin(){
		if(isset($_POST[self::$login])  ){


			return  true;
		}
	}

	public function CheckLogOut(){
		if(isset($_POST[self::$logout])  ){


			return  true;
		}
	}







	//CREATE GET-FUNCTIONS TO FETCH REQUEST VARIABLES
	private function getRequestUserName() {
		//RETURN REQUEST VARIABLE: USERNAME
	}

}
