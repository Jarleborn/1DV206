<?php

//phpinfo();
//INCLUDE THE FILES NEEDED...
require_once('view/NavigationVIew.php');
require_once('view/registerView.php');
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('model/logInModel.php');
require_once('controller/logInController.php');
require_once('model/DAL.php');
require_once('controller/Mastercontroller.php');
require_once('model/session.php');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'off');

//CREATE OBJECTS OF THE VIEWS
$DAL = new DAL();
$s = new Session();
$lm = new LogInModel($DAL, $s);
$rw = new registerView( $s);
$v = new LoginView($lm, $s);
$dtv = new DateTimeView();
$lv = new LayoutView();

$lc = new LogInControll($v, $lm);
$nw = new NavigationView($rw, $v, $lm, $s);
$mc = new MasterController($rw, $DAL, $nw, $s);
//$DAL = new DAL();






//$DAL->ConnectToDB();
//$DAL->addToDB("Hampus","lösen");
$regLink = $rw->getRegisterLink();
$lc->LoginChecker();
$mc->register();
$lm->DoesSessionExsist();
$checker = $lm->UserWantsToLogInOrOut();
//$regChecekr = $rw->doesUserWantsToRegister();
//var_dump($regChecekr);
$lv->render($checker, $nw, $dtv, $regLink);


