<?php
    //verificar usuario valido
    session_start();
    if(empty($_SESSION['nombreUsuario'])){
        echo "Debe autentificarse";
        exit();
    }

    //agregar codigo común
    include '../bd/conexion.php';        

    //recuperar los datos de la interfaz html
	$id     = $_POST['txtId'];
    $matricula = $_POST['txtMatricula'];
    $nombre = $_POST['txtNombre']; 
    $apPaterno = $_POST['txtApPaterno']; 
    $apMaterno = $_POST['txtApMaterno'];
    $email = $_POST['txtEmail'];  
    $especialidad = $_POST['txtEspecialidad'];
    $cursoNombre = $_POST['txtCursoNombre'];
    $estado = $_POST['txtEstado'];
    
?>    
<html>
<head>
    <title></title>
    <!-- funciones javascript  --> 
    <script type="text/javascript" src="../js/funciones.js"></script>        
</head>

<!-- establece foco a la caja de entrada del nombre del curso -->
<body onLoad='javascript: document.getElementById("txtNombre").focus()'>

<!-- nombre de formulario, script a redireccionar y protocolo http de envío al servidor -->
<form id='frmUpdAlumnosProf' action='qryAlumnosProf.php' method='POST'>

    <!--tabla html que contenedora de la forma -->
    <table align='center' width='400'>
        <tr height='100'><td colspan='2' align='center'>
            <b>Modificando Profesores</b>
            <p>Revisa bien los campos antes de grabar</p>
            <!-- objetos necesarios para la forma del qryEspecialidades -->
            <input type='hidden' id='txtOpc' name='txtOpc' value=''>
            <input type='hidden' id='txtId' name='txtId' value='<?php echo($id);?>'>
            </td>
        </tr>                    
        <tr>
            <td>Alumno ID</td>
            <td><?php echo($id);?></td>
        </tr>
         <tr>
            <td>Matricula</td>
            <td><input type='text' id='txtMatricula' name='txtMatricula' maxlength="9" value='<?php echo($matricula);?>'></td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><input type='text' id='txtNombre' name='txtNombre' value='<?php echo($nombre);?>'></td>
        </tr>
        <tr>
            <td>Apellido Paterno</td>
            <td><input type='text' id='txtApPaterno' name='txtApPaterno' value='<?php echo($apPaterno);?>'></td>
        </tr>
        <tr>
            <td>Apellido Materno</td>
            <td><input type='text' id='txtApMaterno' name='txtApMaterno' value='<?php echo($apMaterno);?>'></td>
        </tr>

        <tr>
            <td>Email</td>
            <td><input type='text' id='txtEmail' name='txtEmail' value='<?php echo($email);?>'></td>
        </tr>

         <tr>
            <td>Especialidad</td>
            <td>
            	<select id='especialidad' name="especialidad">
   					<option value="Sistemas">Sistemas</option> 
   					<option value="Mecatronica">Mecatronica</option> 
   					<option value="Gestion">Gestion</option>
   					<option value="Materiales">Materiales</option> 
   					<option value="Electronica">Electronica</option> 
   					<option value="Mecanica">Mecanica</option> 
				</select>
			</td>
        </tr>

        <tr>
            <td>Curso</td>
            <td><input type='text' id='cursoNombre' name='cursoNombre' value="Judo" readonly></td>
            </tr>

        <tr>
            <td>Estado</td>
            <td>
            	<select id='estado' name="estado">
   					<option value="Aprobado">Aprobado</option> 
   					<option value="Reprobado">Reprobado</option> 
				</select>
			</td>
        </tr>

        <tr height='100'>
            <td colspan='2' align='center'>
                <table border='1'>
                <tr>
                <td><input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width: 100px' onClick='enviarAlumnosProf("upd")'></td>
                <td><input type='button' id='btnEliminar' name='btnEliminar' value='Eliminar' style='width: 100px' onClick='enviarAlumnosProf("del")'></td>
                <td><input type='button' id='btnRegresar' name='btnRegresar' value='Regresar' style='width: 100px' onClick='enviarAlumnosProf("back")'></td>
                </tr>
            </td>
        </tr>
    </table>
</html>

