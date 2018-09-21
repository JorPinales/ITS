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
    $opcion = $_POST['txtOpc'];
    $id     = $_POST['txtId'];
    $clave = $_POST['txtClaveEmpleado'];
    $nombre = $_POST['txtNombre']; 
    $apPaterno = $_POST['txtApPaterno']; 
    $apMaterno = $_POST['txtApMaterno']; 
    $cursoImpartido = $_POST['txtCursoImpartido']; 
    $cursoNombre = $_POST['txtCursoNombre'];
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
<form id='frmUpdProfesores' action='qryProfesores.php' method='POST'>

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
            <td>Profesor ID</td>
            <td><?php echo($id);?></td>
        </tr>
         <tr>
            <td>Profesor Clave</td>
            <td><input type='text' id='txtClave' name='txtClave' maxlength="9" value='<?php echo($clave);?>'></td>
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
            <td>Clave de Curso</td>
            <td><input type='text' id='txtClaveCurso' name='txtClaveCurso' value='<?php echo($cursoImpartido);?>'></td>
        </tr>

        <tr>
            <td>Curso Nombre</td>
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

        <tr height='100'>
            <td colspan='2' align='center'>
                <table border='1'>
                <tr>
                <td><input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width: 100px' onClick='enviarProfesores("upd")'></td>
                <td><input type='button' id='btnEliminar' name='btnEliminar' value='Eliminar' style='width: 100px' onClick='enviarProfesores("del")'></td>
                <td><input type='button' id='btnRegresar' name='btnRegresar' value='Regresar' style='width: 100px' onClick='enviarProfesores("back")'></td>
                </tr>
            </td>
        </tr>
    </table>
</html>

