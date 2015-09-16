<?php

//Models
require_once('model/Boat.php');
require_once('model/BoatCatalogue.php');
require_once('model/Member.php');
require_once('model/MemberCatalogue.php');
require_once('model/Secretary.php');
require_once('model/Treasurer.php');

//Views
require_once('view/LayoutHtmlView.php');
require_once('view/MemberCompactView.php');
require_once('view/MemberListView.php');
require_once('view/MemberVerboseView.php');

//Create Models
$boatCatalogue = new BoatCatalogue();
$memberCatalogue = new MemberCatalogue();

//Add member
$memberCatalogue->add(new Member());

$layout = new LayoutHtmlView();

$test = controller->check();

$layout->render($test);

