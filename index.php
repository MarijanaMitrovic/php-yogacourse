<?php
session_start();
ob_start();
include "views/head.php"; 
include "views/nav.php";
?>


<?php




$page = "";
if(isset($_GET['page'])){
	$page = $_GET['page'];
}


include "php/validation.php";
switch($page){
	case "home":
		include "pages/home.php";
		break;
	case "about":
		include "pages/about.php";
		break;
	case "author":
		include "pages/author.php";
		break;
	case "login":
	include "pages/login.php";
	break;
	case "register":
	include "pages/register.php";
	break;
	case "admin":
	include "pages/admin.php";
	break;
	case "user":
	include "pages/user.php";
	break;
	default:
		include "pages/home.php";
		break;
}
?>
			

	


<?php
include "views/footer.php"; ?>