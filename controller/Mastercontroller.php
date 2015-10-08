<?php


require_once("model/DAL.php");
require_once("model/userModel.php");




class MasterController {
	public $RegisterView;
	public $user;
	public function __construct(RegisterView $RegisterView) {
		$this->mysqli = new mysqli("localhost", "root", "GrovSnus2", "php4");
		if (mysqli_connect_errno()) {
		    printf("Connect failed: %s\n", mysqli_connect_error());
		    exit();
			}
			else{
				//echo "conected";
			}
		$this->userDAL = new DAL($this->mysqli);

		$this->RegisterView = $RegisterView;
		
		
		
		//$this->user  = new User("Hasse","hojHoj","hojHoj");
		//$this->productDAL->addToDB($this->user);
	}
	public function register(){

		if($this->RegisterView->doesUserWantsToRegister()){
			//var_dump($this->RegisterView->doesUserWantsToRegister());
			if($this->RegisterView->doesUserWantsToRegister()){
				//var_dump($this->RegisterView->checkIfUserWantsToRegister());
				if($this->RegisterView->checkIfUserWantsToRegister()){
					//echo "hoj hoj";
					$this->user  = new User($this->RegisterView->getRegistrationUserName(),$this->RegisterView->getRegistrationPassword(),$this->RegisterView->getRegistrationRepeatPassword(), $this->RegisterView);
					$this->userDAL->addToDB($this->user, $this->RegisterView);
				}
				
			}
		}
	}
	//public 

}