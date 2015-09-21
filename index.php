<?php

//Models
require_once('model/Boat.php');
require_once('model/Member.php');
require_once('model/MemberCatalogue.php');
require_once('model/Secretary.php');
require_once('model/Treasurer.php');
require_once('model/DAL/MembersDAL.php');
require_once('model/DAL/BoatsDAL.php');

//Views
require_once('view/LayoutHtmlView.php');
require_once('view/MemberCompactView.php');
require_once('view/MemberVerboseView.php');
require_once('view/ContainerView.php');

//Controllers
require_once("controller/controller.php");

//Create Models
$memberCatalogue = new MemberCatalogue();

//Create view
$layout = new LayoutHtmlView();
$compactView = new MemberCompactView();
$verboseView = new MemberVerboseView();
$container = new ContainerView($memberCatalogue, $compactView, $verboseView); //Include all models


//Create controllers
$controller = new Controller($memberCatalogue, $container); //Create controller who 

//Handle input
$controller->doAction();

//Render Result
$layout->render($container);

