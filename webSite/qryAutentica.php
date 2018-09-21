<?php
$dbpass="PASSWORD";
#Discrimiacion de caracteres

#leer objetos html
$pass=$_POST['txtContrasena'];
$user=$_POST['txtUsuario'];


$host="localhost";
$dbuser="root";
$db="kardex";

session_start();

#conexion con la base de datos
$link=mysqli_connect($host,$dbuser,$dbpass,$db);
#marca error si no se puede conectar a la base de datos
if(mysqli_connect_error()){
	echo'<script>'.
	'alert("No se pudo conectar con la base de datos.");'.
	'</script>';
}
#cuando se presiona el boton enviar valida usuario
if(isset($_POST['btnEnviar'])){
	$query="SELECT * FROM usuario WHERE usuario ='".mysqli_real_escape_string($link,$user)."'";
	#hace query para tomar la fila del usuario
	if ($result=mysqli_query($link,$query)) {
		echo "si";
		$registro = mysqli_fetch_array($result);
		echo "si";
		$pass2= $registro['pwd'];
		echo "si";
		$cat = $registro['categoria'];
		echo "si";
		#compara el pass de la base de datos con el introducido
		#por el usuario convertido a md5
		printf("%s (%s)\n", $pass2[1], $pass2["pwd"]);
		echo "si";
		if ($pass2 == md5($pass)) {
			#si es correcto envia  hacia la siguiente ventana
			#header("Location: ")
			$_SESSION['user']=$user;
			$_SESSION['cat']=$cat;
			header('Location: menu.php');

			//switch ($cat) {
			//	case '1':
			//		echo "Menu administrador";
			//		break;
			//	case '2':
			//		echo "Menu profesor";
			//		break;
			//	case '3':
			//		echo "Menu Alumno";
			//		break;
			//}
			echo "YES";
		}else{
			echo '<script>'.
			'alert("Usuario y/o contrasena incorrectos.");'.
			'</script>';
		}
	}else{
			echo '<script>'.
			'alert("Usuario y/o contrasena incorrectos2.");'.
			'</script>';
	}
}
?>