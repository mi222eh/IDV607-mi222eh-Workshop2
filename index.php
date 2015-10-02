<?php

ini_set ("display_errors", "1");

error_reporting(E_ALL);

//Models
require_once('model/Boat.php');
require_once('model/Member.php');
require_once('model/MemberCatalogue.php');
require_once('model/DAL/MembersDAL.php');

//Views
require_once('view/LayoutHtmlView.php');
require_once('view/MemberListView.php');
require_once('view/ContainerView.php');
require_once('view/NavigationView.php');
require_once('view/CreateMemberView.php');
require_once('view/MemberView.php');
require_once('view/CreateBoatView.php');

//Controllers
require_once("controller/controller.php");
require_once("controller/editMemberController.php");
require_once("controller/createMemberController.php");
require_once("controller/deleteMemberController.php");
require_once("controller/createBoatController.php");
require_once("controller/editBoatController.php");
require_once("controller/deleteBoatController.php");

//Create Models
$memberCatalogue = new MemberCatalogue();

//Create view
$createBoatView = new CreateBoatView();
$memberView = new MemberView();
$memberListView = new MemberListView();
$createMemberView = new CreateMemberView();
$layout = new LayoutHtmlView();
$navigationView = new NavigationView();
$container = new ContainerView($memberCatalogue, 
                                $memberListView, 
                                $navigationView, 
                                $createMemberView, 
                                $memberView, 
                                $createBoatView); 

//Create controllers
$editMemberController = new editMemberController($memberView, 
                                                $memberCatalogue, 
                                                $createMemberView);


$createMemberController = new createMemberController($memberCatalogue, 
                                                    $createMemberView);

$deleteMemberController = new deleteMemberController($memberView, 
                                                    $memberCatalogue);

$createBoatController = new createBoatController($memberCatalogue, 
                                                $createBoatView, 
                                                $memberView);

$editBoatController = new editBoatController($createBoatView, 
                                                $memberCatalogue, 
                                                $memberView);
                                                
$deleteBoatController = new deleteBoatController($memberCatalogue, 
                                                 $memberView);
                                                 
$controller = new Controller($memberCatalogue,
                            $container, 
                            $createMemberController, 
                            $memberListView, 
                            $deleteMemberController, 
                            $editMemberController,
                            $createBoatController,
                            $deleteBoatController, 
                            $editBoatController); 

//Handle input
$controller->doAction();

//Render Result
$layout->render($container, $navigationView);

