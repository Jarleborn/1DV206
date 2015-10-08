<?php 

class DAL{


	public function __construct(\mysqli $db) {
		$this->database = $db;
	}
	public $mysqli;

	// public function connectToDB(){
	// $this->mysqli = new mysqli("104.131.98.91", "root", "GrovSnus2", "php4");
	// if (mysqli_connect_errno()) {
 //    printf("Connect failed: %s\n", mysqli_connect_error());
 //    exit();
	// }
	// else{
	// 	echo "conected";
	// }


	public function addToDB(User $toBeAdded){
			$usrName = $toBeAdded->getUserName();
			$password = $toBeAdded->getPassword();


		try{
			$var = null;
			$stmt = $this->database->prepare("INSERT INTO  `php4`.`Users` (`id`, `name`, `password`) VALUES (?, ?, ?)");
			//var_dump($stmt);
			if ($stmt === FALSE) {
				echo "kuken";
			}
			$stmt->bind_param('iss',$var, $usrName ,$password );
			$stmt->execute();
		}
		catch (Exception $e) {
    			echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
	

	}

}