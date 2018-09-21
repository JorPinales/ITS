<?php
    
    //verificar usuario válido
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
    <title>Agrega Alumnos</title>
    <!-- funciones javascript  --> 
    <script type="text/javascript" src="../js/funciones.js"></script>    
</head>

<!-- establece foco a la caja de entrada de la clave -->
<body onLoad="javascript: document.getElementById('txtClave').focus()">

<!-- nombre de formulario, script a redireccionar y protocolo http de envío al servidor -->
<form id='frmAddAlumnos' action='./qryAlumnos.php' method='POST'>

    <!--tabla html que contenedora de la forma -->
    <table align='center' border="1">
        <tr height='50'><td colspan='2' align='center'>
            <b>Agregando Alumnos</b>
            <input type='hidden' id='txtOpc' name='txtOpc' value='add'>
            </td>
        </tr>                    
        <tr>
            <td>Matricula</td>
            <td><input type='text' id='txtMatricula' name='txtMatricula' maxlength="9"></td>
            </tr>
        <tr>
            <td>Nombre</td>
            <td><input type='text' id='txtNombre' name='txtNombre' maxlength="50"></td>
        </tr>
        <tr>
            <td>Apellido Paterno</td>
            <td><input type='text' id='txtApPaterno' name='txtApPaterno' maxlength="50"></td>
        </tr>
        <tr>
            <td>Apellido Materno</td>
            <td><input type='text' id='txtApMaterno' name='txtApMaterno' maxlength="50"></td>
        </tr>
        <tr>
            <td>email</td>
            <td>
				<input type='text' id='txtEmail' name='txtEmail' maxlength="50">
			</td>
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
            <td>Nombre del Curso</td>
            <td>
            	<select id='cursoNombre' name="cursoNombre">
   					<option value="Acondicionamiento Fisico">Acondicionamiento Fisico</option> 
   					<option value="Futbol Soccer">Futbol Soccer</option> 
   					<option value="Fotografia">Fotografia</option>
   					<option value="Fotografia">Fotografia</option> 
   					<option value="Natacion">Natacion</option> 
   					<option value="Judo">Judo</option> 
				</select>
			</td>
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
    </table>

    <!--tabla html que contenedora de botones grabar y regresar -->
    <table align="center">
    <tr height="50px">
        <td align='center'>
            <input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width: 100px' onClick='grabarAlumnos()'>
        </td>
        <td colspan='2' align='center'>
            <input type='button' id='btnRegresar' name='btnRegresa' value='Regresar' style='width: 100px' onClick='regresarShwAlumnos()'>            
        </td>
    </tr>
    </table>
</form>
</body>
</html>

