<?php

//INCLUDE THE FILES NEEDED...
require_once('view/NavigationVIew.php');
require_once('view/registerView.php');
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('model/logInModel.php');
require_once('controller/logInController.php');



//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'off');

//CREATE OBJECTS OF THE VIEWS
$lm = new LogInModel();
$rw = new registerView();
$v = new LoginView($lm, $rw);
$dtv = new DateTimeView();
$lv = new LayoutView();
$lc = new LogInControll($v, $lm);
$nw = new NavigationView($rw, $v, $lm);



$regLink = $rw->getRegisterLink();
$lc->LoginChecker();
$lm->DoesSessionExsist();
$checker = $lm->UserWantsToLogInOrOut();
$regChecekr = $rw->doesUserWantsToRegister();
//var_dump($regChecekr);
$lv->render($checker, $nw, $dtv, $regLink);


