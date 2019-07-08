<?php 

	class Session{

		public function __construct(){
			session_start();
		}

		public function setSession($user){
			$_SESSION['usuario'] = $user;
		}

		public function getSession(){
			return $_SESSION['usuario'];
		}

		public function cerrarSession(){
			session_unset();
			session_destroy();
		}
	}




 ?>