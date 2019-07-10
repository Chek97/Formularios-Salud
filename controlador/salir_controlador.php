<?php 

	include_once("../modelo/session.php");

	$oSession = new Session();

	$oSession->cerrarSession();

	header("location: ../index.php");





 ?>