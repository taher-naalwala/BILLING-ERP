<?php 
session_start();
$_SESSION["varname"] = "";
session_destroy();
header("Location: login.php");