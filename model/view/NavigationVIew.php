<?php

class NavigationView {

	public $LoginView;
	public $RegisterView;
	public $response;
	public $LogInModel;
	public $isUserRegistrated;
	private $SessionModel;

public function __construct(RegisterView $RegisterView, LoginView $LoginView, LogInModel $LogInModel, Session $SessionModel ){
		$this->RegisterView = $RegisterView;
		$this->LoginView = $LoginView;
		$this->LogInModel = $LogInModel;
		$this->SessionModel = $SessionModel;
	}
	public function getResMessage(){
		//var_dump($this->SessionModel->getSessionRetMessage());
		// $sesRetMess = $this->SessionModel->getSessionRetMessage();
		// if(isset($sesRetMess)){
		// 	return $message = $sesRetMess;
		// 	//session_destroy();
		// }
		// else{
		return $message = $this->LogInModel->ReturnRetMessage();
		//}
	}
public function response() {
		


		$this->response = "";
		if ($this->RegisterView->doesUserWantsToRegister()) {
			//var_dump($this->response .= $this->RegisterView->generateRegisterForm());
			$this->response .= $this->RegisterView->generateRegisterForm();

			
			# code...
		}
		elseif(!$this->LogInModel->UserWantsToLogInOrOut()){

			$this->response .= $this->LoginView->generateLoginFormHTML($this->getResMessage());
			session_destroy();
		}
		elseif($this->LogInModel->UserWantsToLogInOrOut()){
			$this->response .= $this->LoginView->generateLogoutButtonHTML($this->getResMessage());

		}


		return $this->response;

	}

	public function redirectToStart(){
		
        //header("Location: http://188.166.121.53/php4/index.php?");
       
        $this->SessionModel->setSessionRetMessage("Registered new user.");

		$link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
        header("Location:$link");
        //header("Location: http://localhost/php%204/Php-Uppgift-2/Php-uppgft-4%20reg/?");
    	
	}


    // public function setRetMessage($mess){
   		
    // }

    // public function setRegStatus($status){
    // 	var_dump($status);
    // 	$this->isUserRegistrated = $status;
    // 	var_dump($this->isUserRegistrated);
    // }


}