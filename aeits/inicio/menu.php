<?php
	session_start();
		if(empty($_SESSION['nombreUsuario'])){
			echo "Debe autentificarse";
		}
		$cat = $_SESSION['tipoUsuario'];

		switch ($cat) {
				case '1':
					header("Location: ./menuAdmin.php");
					break;
				case '2':
					header("Location: ./menuProf.php");
					break;
				case '3':
					header("Location: ./menuSE.php");
					break;
			}		
?>