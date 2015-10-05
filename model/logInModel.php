<?php 

class LogInModel{
	
	private  $username = 'Admin';
	private  $password = 'Password';
	private static $LOGGED_IN_SESSION ="LoggedInSession";
	private  $Thelogin;
	private $s;
	private  $retMessage = "";



	public function login($usrnam, $pass){
		$this->Thelogin = false;
		if($this->username == $usrnam && $this->password == $pass){
			$_SESSION[self::$LOGGED_IN_SESSION] = true;
			$this->retMessage = "Welcome";
			}
			elseif($usrnam == ""  ){
				$this->retMessage = "Username is missing";
				$_SESSION[self::$LOGGED_IN_SESSION] = false;
			}
			elseif($pass == "" && $usrnam !="" ){
				$this->retMessage = "Password is missing";
				$_SESSION[self::$LOGGED_IN_SESSION] = false;

			}
			else{
				$this->retMessage = "Wrong name or password";
				$_SESSION[self::$LOGGED_IN_SESSION] = false;
				
			}

	}
	
	public function ReturnRetMessage(){
		if($this->retMessage != null){
			return $this->retMessage;
		}
	}
	//kollar om användaren vill logga ut eller in 
	public function UserWantsToLogInOrOut(){
			if ($_SESSION[self::$LOGGED_IN_SESSION] == true){
				return true;
			}
			else{

				return false;
			}
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

}