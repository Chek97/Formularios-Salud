<?php 

	include_once("../../modelo/Session/session.php");

	$oSession = new Session();

	$oSession->cerrarSession();

	header("location: ../../index.php");





 ?>