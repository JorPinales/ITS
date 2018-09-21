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
	<title>Menu Servicios Escolares</title>
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
     	  	<button type="button" class="btn" onclick='ActualizarAlumnos()'>Actualizar Alumnos Aprobados</button>
			<button type="button" class="btn" onclick='shwAlumnosAprobados()'>Alumnos Aprobados</button>

     	  	<button type="button" class="btn btn-light" onclick='regresar()'>Cerrar Sesion</button>
		</div>
	</nav>

	<div id="divSE"></div>


<script type="text/javascript">
	
  function ActualizarAlumnos(){
    $("#divSE").load("../json/insertJSON.php");
   }

	 function shwAlumnosAprobados(){
	 	$("#divSE").load("../alumnosAprobados/shwAlumnosAprobados.php");
	 }

</script>
</body>
</html>