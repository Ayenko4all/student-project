<?php
include_once "includes/db.php";
unset($_SESSION['logged']);
session_unset();
session_destroy();
redirect('login.php');