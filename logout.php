<?php 
session_start();
if(($_SESSION['user']) && isset($_SESSION['pass']))
{
	
	session_destroy();
	header('Location: signin.php');}
?>