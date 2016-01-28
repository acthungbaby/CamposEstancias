<?php
session_start();
if(isset($_SESSION['login_admin']) && $_SESSION['login_admin'] == 'OK') {
	header("Location: propiedades.php");
	exit();
} else {
	header("Location: login.php");
	exit();
}
?>