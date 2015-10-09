<?php 


class TooShortUserNameException extends \Exception {};
class TooShortPasswordException extends \Exception {};
class NoUnniqueUserNameException extends \Exception {};
class NotMatchingPasswrodsException extends \Exception {};
class NoUsernameException extends \Exception {};
class NoPasswordException extends \Exception {};
class HTMLinUserNameException extends \Exception {};
class falseUserNameAndPasswordException extends \Exception {};



class User{
	private $name;
	private $password;
	private $RegisterView;
	private $DAL;

	public function __construct($name, $password, $repeatedPassword, RegisterView $RegisterView, DAL $DAL ) {
		$this->DAL = $DAL;
		$this->RegisterView = $RegisterView;
		try{
			if (is_string($name) == false || strlen($name) <= 2 && strlen($password) <= 5){
				throw new falseUserNameAndPasswordException("Username has too few characters, at least 3 characters. Password has too few characters, at least 6 characters");
				
			}
			elseif (is_string($name) == false || strlen($name) <= 2){
				throw new NoUsernameException("Username has too few characters, at least 3 characters");
				
			}
			elseif (strlen($password) <= 5){
				throw new TooShortPasswordException("Password has too few characters, at least 6 characters");
			}
			elseif ($repeatedPassword != $password){
				throw new NotMatchingPasswrodsException("Passwords do not match");
			}
			elseif (!$this->compareUserName($name)){
				throw new NoUnniqueUserNameException("User exists, pick another username");
			}
			elseif($name != strip_tags($name)) {
				throw new HTMLinUserNameException("Username contains invalid characters");
				
			}
			else{
				$this->name = $name;
				$this->password = $password;
				
			}
			}
			catch(falseUserNameAndPasswordException $ex){
				$this->RegisterView->changeResponseMessage($ex->getMessage());
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
			catch(NoUnniqueUserNameException $ex){
				$this->RegisterView->changeResponseMessage($ex->getMessage());
			}
			catch(HTMLinUserNameException $ex){
				$this->RegisterView->changeResponseMessage($ex->getMessage());
			}
			
	}

	public function getUserName(){
		return $this->name;
	}

	public function getPassword(){
		return $this->password;
	}

	public function compareUserName($UserInputedUserName){
			
			//var_dump($UserInputedUserName);
			//var_dump($this->DAL->getAllFromDB());
		foreach ($this->DAL->getAllUsernameFromDB() as $username ) {
			//var_dump($username);
			
			if($UserInputedUserName == $username){
				return false;
			}
			
		}
		return true;
	}

}