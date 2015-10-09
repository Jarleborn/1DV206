<?php


//require_once("model/DAL.php");
require_once("model/userModel.php");




class MasterController {
	private $RegisterView;
	public $user;
	private $LogInModel;
	private $DAL;
	private $NavigationView;
	private $Session;
	public function __construct(RegisterView $RegisterView, DAL $DAL, NavigationView $NavigationView, Session $Session) {
		
		$this->NavigationView = $NavigationView;
		$this->userDAL = $DAL;
		$this->Session = $Session;
		//var_dump($DAL);
		//$this->LogInModel($this->userDAL);
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
					$this->user  = new User($this->RegisterView->getRegistrationUserName(),$this->RegisterView->getRegistrationPassword(),$this->RegisterView->getRegistrationRepeatPassword(), $this->RegisterView, $this->userDAL);
					//var_dump($this->userDAL->addToDB($this->user, $this->RegisterView));
					if($this->userDAL->addToDB($this->user, $this->RegisterView)){
						
						$this->NavigationView->redirectToStart();

					}
					//var_dump($this->userDAL->addToDB($this->user, $this->RegisterView));
					//
				
				}
				
			}
		}
	}



	//public 

}