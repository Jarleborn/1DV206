<?php 


class TooShortUserNameException extends \Exception {};
class TooShortPasswordException extends \Exception {};
class NoUnniqueUserNameException extends \Exception {};
class NotMatchingPasswrodsException extends \Exception {};
class NoUsernameException extends \Exception {};
class NoPasswordException extends \Exception {};



class User{
	private $name;
	private $password;
	private $RegisterView;

	public function __construct($name, $password, $repeatedPassword, RegisterView $RegisterView) {

		$this->RegisterView = $RegisterView;
		try{
			if (is_string($name) == false || strlen($name) <= 2){
				throw new NoUsernameException("Username has too few characters, at least 3 characters");
				
			}
			elseif (strlen($password) <= 5){
				throw new TooShortPasswordException("Password has too few characters, at least 6 characters");
			}
			elseif ($repeatedPassword != $password){
				throw new NotMatchingPasswrodsException("Passwords do not match");
			}
			else{
				$this->name = $name;
				$this->password = $password;
			}
			}
			catch(NoUsernameException $ex){
				$this->RegisterView->changeResponseMessage($ex->getMessage());
			}
			catch(TooShortPasswordException $ex){
					$this->RegisterView->changeResponseMessage($ex->getMessage());
			}
			catch(NotMatchingPasswrodsException $ex){
				$this->RegisterView->changeResponseMessage($ex->getMessage());
			}
			
	}

	public function getUserName(){
		return $this->name;
	}

	public function getPassword(){
		return $this->password;
	}

}