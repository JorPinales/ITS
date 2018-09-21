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
    <title>Agrega Profesores</title>
    <!-- funciones javascript  --> 
    <script type="text/javascript" src="../js/funciones.js"></script>    
</head>

<!-- establece foco a la caja de entrada de la clave -->
<body onLoad="javascript: document.getElementById('txtClave').focus()">

<!-- nombre de formulario, script a redireccionar y protocolo http de envío al servidor -->
<form id='frmAddProfesores' action='./qryProfesores.php' method='POST'>

    <!--tabla html que contenedora de la forma -->
    <table align='center' border="1">
        <tr height='50'><td colspan='2' align='center'>
            <b>Agregando Profesores</b>
            <input type='hidden' id='txtOpc' name='txtOpc' value='add'>
            </td>
        </tr>                    
        <tr>
            <td>Clave Empleado</td>
            <td><input type='text' id='txtClave' name='txtClave' maxlength="9"></td>
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
            <td>Clave del Curso</td>
            <td>
				<input type='text' id='txtClaveCurso' name='txtClaveCurso' maxlength="50">
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
    </table>

    <!--tabla html que contenedora de botones grabar y regresar -->
    <table align="center">
    <tr height="50px">
        <td align='center'>
            <input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width: 100px' onClick='grabarProfesores()'>
        </td>
        <td colspan='2' align='center'>
            <input type='button' id='btnRegresar' name='btnRegresa' value='Regresar' style='width: 100px' onClick='regresarShwProfesores()'>            
        </td>
    </tr>
    </table>
</form>
</body>
</html>

