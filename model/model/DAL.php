<?php 

class DAL{


	public function __construct() {

		$this->mysqli = new mysqli("localhost", "root", "GrovSnus2", "php4");
		if (mysqli_connect_errno()) {
		    printf("Connect failed: %s\n", mysqli_connect_error());
		    exit();
			}
			else{
				//echo "conected";
			}
		
	}
	public $mysqli;
	private $userList = array();
	private $passwords = array();
	public $SALT = "";



	public function getAllUsernameFromDB(){
		$stmt = $this->mysqli->prepare("SELECT name FROM Users");
		if($stmt === false){
			throw new Exception("A database error");
		}

		$stmt->execute();

		$stmt->bind_result($name);
		while($stmt->fetch()){
			$userName = $name;
			$this->userList[] = $userName;
		}
		//var_dump($this->userList);
		return $this->userList;

	}
	public function getAllPasswordsFromDB(){
		$stmt = $this->mysqli->prepare("SELECT password FROM Users");
		if($stmt === false){
			throw new Exception("A database error");
		}

		$stmt->execute();

		$stmt->bind_result($password);
		while($stmt->fetch()){
			$passwords = $password;
			$this->passwords[] = $passwords;
		}
		//var_dump($this->userList);
		return $this->passwords;

	}
	

	public function addToDB(User $toBeAdded){
			$usrName = $toBeAdded->getUserName();
			$password = $toBeAdded->getPassword();
			$saltedPassword = sha1($this->SALT . $password);


		try{
			$var = null;
			$stmt = $this->mysqli->prepare("INSERT INTO  `php4`.`Users` (`id`, `name`, `password`) VALUES (?, ?, ?)");
			//var_dump($stmt);
			if ($stmt === FALSE) {
				throw new Exception("A database error");
			}

			$stmt->bind_param('iss',$var, $usrName ,$saltedPassword );
			//var_dump($stmt->execute());
			if($stmt->execute()){
				return true;
			}

		}
		catch (Exception $e) {
    			echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
	

	}

}