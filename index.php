<?php

ini_set ("display_errors", "1");

error_reporting(E_ALL);

//Models
require_once('model/Boat.php');
require_once('model/Member.php');
require_once('model/MemberCatalogue.php');
require_once('model/DAL/MembersDAL.php');
require_once('model/DAL/BoatsDAL.php');

//Views
require_once('view/LayoutHtmlView.php');
require_once('view/MemberCompactView.php');
require_once('view/MemberVerboseView.php');
require_once('view/ContainerView.php');
require_once('view/NavigationView.php');
require_once('view/CreateUserView.php');

//Controllers
require_once("controller/controller.php");

//Create Models
$memberCatalogue = new MemberCatalogue();

//Create view
$createUserView = new CreateUserView();
$layout = new LayoutHtmlView();
$compactView = new MemberCompactView();
$verboseView = new MemberVerboseView();
$navigationView = new NavigationView();
$container = new ContainerView($memberCatalogue, $compactView, $verboseView, $navigationView, $createUserView); 

//Create controllers
$controller = new Controller($memberCatalogue, $container); //Create controller who 

//Handle input
$controller->doAction();

//Render Result
$layout->render($container, $navigationView);

