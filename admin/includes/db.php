<?php

$conn = mysqli_connect("localhost", "root", "", "happy_store");

if (mysqli_connect_errno()) {
	echo 'not connected with following error: '. mysqli_connect_error();
	die();
}
session_start();

if(isset($_SESSION['success_flash'])){
	echo '<div class="bg-success"><h3 class="text-success text-center">'.$_SESSION['success_flash'].'</h3></div>';
	unset($_SESSION['success_flash']);
}
if(isset($_SESSION['error_flash'])){
	echo '<div class="bg-danger"><h3 class="text-danger text-center">'.$_SESSION['error_flash'].'</h3></div>';
	unset($_SESSION['error_flash']);
}


include ("functions.php");











