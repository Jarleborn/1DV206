<?php 

class LogInModel{
	
	private  $username = 'Admin';
	private  $password = 'Password';
	private static $LOGGED_IN_SESSION ="LoggedInSession";
	private static $USRNAM_SESSION ="";
	private  $Thelogin;
	private $s;
	private  $retMessage = "";
	private $DAL;
	private $SessionModel;

	public function __construct(DAL $DAL, Session $Session) {
		
		$this->DAL = $DAL;
		$this->SessionModel = $Session;
		session_start(LogInModel::$LOGGED_IN_SESSION);
	}

	public function login($usrnam, $pass){

		$this->SessionModel->setUserNameIsSession($usrnam);
		$this->Thelogin = false;
		if($this->compareUserName($usrnam) && $this->comparePassword($pass)){
			
			//var_dump($_SESSION[self::$USRNAM_SESSION]);
			$_SESSION[self::$LOGGED_IN_SESSION] = true;
			$this->SetRetMeddage("Welcome");
			}
			elseif($usrnam == ""  ){
				$this->SetRetMeddage("Username is missing");
				$_SESSION[self::$LOGGED_IN_SESSION] = false;
			}
			elseif($pass == "" && $usrnam !="" ){
				$this->SetRetMeddage("Password is missing");
				$_SESSION[self::$LOGGED_IN_SESSION] = false;

			}
			else{
				$this->SetRetMeddage("Wrong name or password");
				$_SESSION[self::$LOGGED_IN_SESSION] = false;
				
			}

	}
	
	public function SetRetMeddage($mess){
		$this->retMessage = $mess;
	}


	public function compareUserName($UserInputedUserName){
			
			//var_dump($UserInputedUserName);
			//var_dump($this->DAL->getAllFromDB());
		foreach ($this->DAL->getAllUsernameFromDB() as $username ) {
			//var_dump($username);
			// var_dump($UserInputedUserName);
			// var_dump($username);
			if($UserInputedUserName == $username){
				return true;
			}
			
		}
		return false;
	}

	public function comparePassword($UserInputedPasswrod){
			$SaltedUserInput = sha1($this->DAL->SALT.$UserInputedPasswrod);
			//var_dump($UserInputedUserName);
			// var_dump($this->DAL->getAllPasswordsFromDB());
		foreach ($this->DAL->getAllPasswordsFromDB() as $password ) {
			//var_dump($username);
			// var_dump($UserInputedPasswrod);
			// var_dump($password);
			if($SaltedUserInput == $password){
				return true;
			}
			
		}
		return false;
	}

	public function ReturnRetMessage(){
		//var_dump($this->retMessage);
		if($this->retMessage != null){
			return $this->retMessage;
		}
	}
	//kollar om användaren vill logga ut eller in 
	public function UserWantsToLogInOrOut(){
			
				return $_SESSION[self::$LOGGED_IN_SESSION];
			// }
			// else{

			// 	return false;
			// }
		}
			
	

	public function DoesSessionExsist(){
		if(isset($_SESSION[self::$LOGGED_IN_SESSION])){
			$_SESSION[self::$LOGGED_IN_SESSION];
		}
		else{
				
				$_SESSION[self::$LOGGED_IN_SESSION];
			}
	}
	//kollar om anvädnaren är inloggad
	public function CheckIfLoggedIn(){
		if($_SESSION[self::$LOGGED_IN_SESSION] == true){
			return true;
		}
		else{
			return false;
		}
	}

	public function StopSession(){
		$_SESSION[self::$LOGGED_IN_SESSION] = false;
        $this->retMessage = 'Bye bye!';
        session_destroy();
      }

     public function getLastUserName(){
     	//var_dump($_SESSION[self::$USRNAM_SESSION]);
     	return $_SESSION[self::$USRNAM_SESSION];
     }

}