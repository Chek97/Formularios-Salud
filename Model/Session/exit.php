<?php 

	include_once("../../Model/Session/session.php");

	$oSession = new Session();

	$oSession->cerrarSession();

	header("location: ../../index.php");





 ?>