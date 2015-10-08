<?php

class NavigationView {

	public $LoginView;
	public $RegisterView;
	public $response;
	public $LogInModel;

public function __construct(RegisterView $RegisterView, LoginView $LoginView, LogInModel $LogInModel ){
		$this->RegisterView = $RegisterView;
		$this->LoginView = $LoginView;
		$this->LogInModel = $LogInModel;
	}

public function response() {
		$message = $this->LogInModel->ReturnRetMessage();
		$this->response = "";
		if ($this->RegisterView->doesUserWantsToRegister()) {
			//var_dump($this->response .= $this->RegisterView->generateRegisterForm());
			$this->response .= $this->RegisterView->generateRegisterForm();

			
			# code...
		}
		elseif(!$this->LogInModel->UserWantsToLogInOrOut()){

			$this->response .= $this->LoginView->generateLoginFormHTML($message, "Admin");
		}
		elseif($this->LogInModel->UserWantsToLogInOrOut()){
			$this->response .= $this->LoginView->generateLogoutButtonHTML($message);

		}


		return $this->response;

	}	


}