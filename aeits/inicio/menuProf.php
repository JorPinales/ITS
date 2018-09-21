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
	<title>Menu Profesor</title>
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
     	  	<button type="button" class="btn" onclick='profCursos()'>Cursos</button>
           	<button type="button" class="btn" onclick='profAlumnos()'>Alumnos</button>

     	  	<button type="button" class="btn btn-light" onclick='regresar()'>Cerrar Sesion</button>
		</div>
	</nav>

	<div id="divProf"></div>


<script type="text/javascript">
	
function profAlumnos(){
$	("#divProf").load("../alumnos/shwAlumnosProf.php");
}

function profCursos(){
	$("#divProf").load("../cursos/shwCursosProf.php");
}

</script>
</body>
</html>