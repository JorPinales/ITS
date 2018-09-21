<?php
session_start();

include_once '../bd/conexion.php';
//cuando se presiona el boton enviar valida usuario
if(isset($_POST["enviar"])){
	$pass=$_POST['pass'];
	$user=$_POST['user'];
	$strQry="select * from usuarios where nombreUsuario = '".mysqli_real_escape_string($link,$user)."'";
	#hace query para tomar la fila del usuario
	if($result= mysqli_query($link,$strQry)){
		$registro = mysqli_fetch_array($result);
		$pass2    = $registro['password'];
		$cat      = $registro['tipoUsuario'];
		$usr      = $registro['nombreUsuario'];
		#compara el pass de la base de datos con el introducido
		if($pass2 == $pass){
			#si es correcto envia hacia la siguiente ventana			
			$_SESSION['nombreUsuario'] = $usr;
			$_SESSION['tipoUsuario'] = $cat;
			header("Location: ./menu.php");
		}else{
			echo'<script>'.
			'alert("Usuario y/o contrasena incorrectos");'.
			'</script>';
		}
	}else{
			echo'<script>'.
			'alert("Usuario y/o contraseña incorrectos");'.
			'</script>';
				
	}
}

?>