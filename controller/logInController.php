<?php 

class LogInControll{

	private $LogInModel;
	private $LoginView;
	
	public function __construct( LoginView $LoginView, LogInModel $LogInModel){
		$this->LogInModel = $LogInModel;
		$this->LoginView = $LoginView;
	}
	public function LoginChecker(){
		session_start();
		$this->LogInModel->DoesSessionExsist();
		if($this->LogInModel->CheckIfLoggedIn() == false){
			if($this->LoginView->Checklogin() == true){

			    $this->LogInModel->login($this->LoginView->GetUserName(), $this->LoginView->GetPassword());
			
			}
	   }
	   else{
	   		if($this->LogInModel->CheckIfLoggedIn() == true){
				if($this->LoginView->ChecklogOut() == true){
				$this->LogInModel->StopSession();
			
				}
	   		}
	   }
	}	
}