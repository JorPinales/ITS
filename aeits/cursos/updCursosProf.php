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
    $opc        = $_POST['txtOpc'];
    $id     = $_POST['txtId'];
    $clave  = $_POST['txtClave'];
    $nombre = $_POST['txtNombre']; 
    $instructor = $_POST['txtInstructor'];
    $hora = $_POST['txtHora']; 
    $dias = $_POST['txtDias']; 
    $lugar = $_POST['txtLugar']; 

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
<form id='frmUpdCursos' action='qryCursos.php' method='POST'>

    <!--tabla html que contenedora de la forma -->
    <table align='center' width='400'>
        <tr height='100'><td colspan='2' align='center'>
            <b>Modificando Cursos</b>
            <!-- objetos necesarios para la forma del qryEspecialidades -->
            <input type='hidden' id='txtOpc' name='txtOpc' value=''>
            <input type='hidden' id='txtId' name='txtId' value='<?php echo($id);?>'>
            </td>
        </tr>                    
        <tr>
            <td>Clave del Curso</td>
            <td><input type='text' id='txtClave' name='txtClave' value='<?php echo($clave);?>'></td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><input type='text' id='txtNombre' name='txtNombre' value='<?php echo($nombre);?>'></td>
        </tr>
        <tr>
            <td>Instructor</td>
            <td><input type='text' id='txtInstructor' name='txtInstructor' value='<?php echo($instructor);?>'></td>
        </tr>
        <tr>
            <td>Hora</td>
            <td><input type='text' id='txtHora' name='txtHora' value='<?php echo($hora);?>'></td>
        </tr>
        <tr>
            <td>Dias</td>
            <td><input type='text' id='txtDias' name='txtDias' value='<?php echo($dias);?>'></td>
        </tr>
         <tr>
            <td>Lugar</td>
            <td><input type='text' id='txtLugar' name='txtLugar' value='<?php echo($lugar);?>'></td>
        </tr>
        <tr height='100'>
            <td colspan='2' align='center'>
                <table border='1'>
                <tr>
                <td><input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width: 100px' onClick='enviarCursos("upd")'></td>
                <td><input type='button' id='btnEliminar' name='btnEliminar' value='Eliminar' style='width: 100px' onClick='enviarCursos("del")'></td>
                <td><input type='button' id='btnRegresar' name='btnRegresar' value='Regresar' style='width: 100px' onClick='enviarCursos("back")'></td>
                </tr>
            </td>
        </tr>
    </table>
</html>

