<?php
	session_start();
    if(empty($_SESSION['nombreUsuario'])){
            echo "Debe autentificarse";
            exit();
    }
    //agregar codigo común
    include '../bd/conexion.php';
?>
<html>
<head>
	<title>Menu Administrador</title>
</head>

    <link href="../css/bootstrap.min.css" rel="stylesheet">

   <script src="../jquery/jquery.js"></script>
    <script src="../jquery/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../js/funciones.js"></script>
   
<body>
	
	<nav class="navbar navbar-fixed-top navbar-light bg-light" role="navigation">
	<div class="container-fluid">
     <div class="navbar-header">
      <a class="navbar-brand" href="#">
      	<img src="../img/its.png" width="50" height="50" alt=""></a>
      	 </div>            
     	  	<button type="button" class="btn" onclick='shwProfesores()'>Profesores</button>
           	<button type="button" class="btn" onclick='shwCursos()'>Cursos</button>
			<button type="button" class="btn" onclick='shwAlumnos()'>Alumnos</button>

     	  	<button type="button" class="btn btn-light" onclick='regresar()'>Cerrar Sesion</button>
		</div>
	</nav>

	<div id="divAdmin"></div>


<script type="text/javascript">
	
  function shwAlumnos(){
    $("#divAdmin").load("../alumnos/shwAlumnos.php");
   }

	 function shwCursos(){
	 	$("#divAdmin").load("../cursos/shwCursos2.php");
	 }

	function shwProfesores(){
	 $("#divAdmin").load("../profesores/shwProfesores.php");

}
</script>
</body>
</html>